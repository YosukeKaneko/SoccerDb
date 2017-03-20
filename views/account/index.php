<?php $this->setLayoutVar('title', 'admin'); ?>

<div id="app">
	<div class="row">
		<div class="col-sm-4">
			<h1 class="text-center">Teams</h1><br><br>
			<span id="error" class="text-danger"></span>
			<form id="addTask">
				<div class="form-group">
				  	<label for="title" id="label">Team Name</label>
				  	<input type="text" id="title" name="title" class="form-control">
				  	<p id="addTeam" class="btn btn-primary">Add</p>
				</div>
			</form>
			<!-- <a href="javascript:;" id="new-task">+ New Task</a><br> -->
			<div id="tasks" class="list-group">
				<script type="text/template" id="team-name-template">
					<a href="javascript:;" class="selectTeam">Select</a>&nbsp;&nbsp;&nbsp;<span class="nameOfTeam"><%- title %></span><a href="javascript:;" class="delete-team pull-right">Delete</a>
				</script>
			</div>		
		</div>
		<div class="col-sm-4">
			<h1 class="text-center">Players<br><span id="selectedTeam" class="small text-danger">Please select a team</span></h1>
			<span id="playerError" class="text-danger"></span>
			<form id="addPlayer">
				<div class="form-group">
					<label for="player-name">Player Name</label>
					<input type="text" id="playerName" class="form-control" name="playerName">
					<input type="hidden" id="teamId" name="teamId">
					<p id="playerAdd" class="btn btn-primary">Add Player</p>
				</div>
			</form>
			<div id="players">
				<script type="text/template" id="player-name-template">
					<%- name %><a href="javascript:;" class="delete-player pull-right">Delete</a>
				</script>
			</div>
		</div>
		<div class="col-sm-4">
			<h1 class="text-center">Results</h1>
		</div>
	</div>
</div>