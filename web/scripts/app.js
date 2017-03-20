$('#addTeam').on('click', function(){
  var title = $('#title').val();
  var task = new Task;
  if (task.set({title: title}, {validate: true})) {
      task.save();
      tasks.add(task);
      $('#error').empty();
      $('#title').val('');
  };
});
$('#playerAdd').on('click', function(){
  var teamId = $('#teamId').val();
  var playerName = $('#playerName').val();
  var player = new Player();
  if (player.set({teamId: teamId, playerName: playerName}, {validate: true})) {
    $.when(
      player.save()
    ).done(function(){ 
      $('#playerError').empty();
      $('#playerName').val('');
      players.fetch();
    });
  }
})



var Task = Backbone.Model.extend({    
    url: function (){
      return this.id ? "teamss.php?id="+this.id : "teams.php";
    },
    defaults: { 
      done: 0,
    },
    validate: function(attrs){
      if (_.isEmpty(attrs.title)) {
        return 'Team name must not be empty';
      }
    },
    initialize: function(){
      this.on('invalid', function(model, error){
        $('#error').html(error);
      });
    },
});
var Player = Backbone.Model.extend({
  url: 'player.php',
  changeurl: function(url){
    this.url = url;
  },
  validate: function(attrs){
    if (_.isEmpty(attrs.teamId)) {
      return 'Please select a team to be modified';
    }else if (_.isEmpty(attrs.playerName)){
      return 'Player name must not be empty';
    }
  },
  initialize: function(){
    this.on('invalid', function(model, error){
      $('#playerError').html(error);
    });
  }
});


var Tasks = Backbone.Collection.extend({
  model: Task,
  url: 'teams.php'
});
var Players = Backbone.Collection.extend({
  model: Player,
  defaults: {
    url: "player.php",
  },
  seturl: function(url){
    this.url = url;
  }
});


var TasksView = Backbone.View.extend({
  initialize: function() {
    this.collection.on('add remove', this.render, this)
    this.collection.on('remove', this.remove, this)
  },
  remove: function(task){
    Backbone.sync("delete", task)
  },
  tagName: 'ul',
  render:function () {
    $("#tasks").children().detach();
    $("#tasks").append(
      this.collection.map(function(task){
        return new TaskView({model: task}).render();
      })
    );
  }
});
var PlayersView = Backbone.View.extend({
  tagName: 'ul',
  initialize: function(){
    this.collection.on('add remove', this.render, this)
    this.collection.on('remove', this.remove, this)
  },
  remove: function(player, url){
    player.set({url: url.url});
    Backbone.sync("delete", player);
  },
  render:function(){
    $('#players').children().detach();
    $('#players').append(
      this.collection.map(function(player){
        return new PlayerView({model: player}).render();
      })
    );
    return this;
  },
});


var TaskView = Backbone.View.extend({
  tagName: 'li',
  class:'list-group-item',
  events: {
    'click .delete-team': function(){
      tasks.remove(this.model)
    },
    'click .selectTeam': function(){
      $('#teamId').val(this.model.id);
      $('#selectedTeam').html('Editting: '+this.model.attributes.title);
      var getmethodurl = '/player.php?id='+this.model.id;
      players.seturl(getmethodurl);
      players.fetch();
    }
  },
  template: _.template($('#team-name-template').html()),
  render: function(){
    return this.$el.html(this.template(this.model.attributes));
  }
})
var PlayerView = Backbone.View.extend({
  tagName: 'li',
  events: {
    'click .delete-player': function(){
      var deleteurl = '/player.php?id='+this.model.id;
      this.model.changeurl(deleteurl);
      players.remove(this.model, deleteurl);
    },
  },
  template: _.template($('#player-name-template').html()),
  render: function(){
    return this.$el.html(this.template(this.model.attributes));
  },
});

var tasks = new Tasks(); //Create a new collection
var tasksView = new TasksView({collection: tasks }); //Assign it to a view    
tasks.fetch(); //Get current tasks from DB

var players = new Players();
var playersView = new PlayersView({collection: players});
