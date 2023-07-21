<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title></title>
	</head>
	<body>
		<header class="exercise-header">
		  <inner-column>
		    <h2>efp password validator</h2>
		    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem repudiandae laboriosam nisi obcaecati alias dolorum cumque, numquam fuga eveniet molestias minus inventore, nesciunt nulla rerum id distinctio libero nostrum ducimus.</p>
		  </inner-column>
		</header>

		<section class="efp-exercise">
		  <inner-column>
		    <h2>type your username and password</h2>
		    
		    <form>
		      <div class="field">
		        <label for="username">username</label>
		        <input id="username" name="username" type="text" placeholder="username" required>
		      </div>

		      <div class="field">
		        <label for="user-password">password</label>
		        <input id="user-password" name="user-password" type="password" placeholder="atleast 8 chars" pattern=".{8,}" required>
		      </div>
		      
		      <button type="submit">submit</button>
		    </form>
		    
		    <results></results>
		  </inner-column>
		</section>

		<script src="script.js">
			
		</script>
	</body>
</html>