<!DOCTYPE html>
<HTML lang="en">
	<head>
		<meta charset="utf-8"/>
		<link type="text/css" href="style.css" rel="stylesheet" />
		<title>Data Design Project</title>
	</head>
	<body>
		<h1>Data Design Project</h1>
		<h2>Persona</h2>
		<P>Adam is a 28 year old male. He likes to be updated about the most recent news from around the world. He also really loves discussing and reading about music. His needs are to be able to post about the topics he finds interesting. He also needs to be able to comment on others posts. Ideal features Adam likes are multi platform accessing, the ability to share posts to others on social media, and to subscribe to certain subreddits. He uses an iMac that runs the most recent MacOS update and an iPhone 6 Plus with the latest iOS update. He gets frustrated by ads and click bait. He also doesn't like trollers and users who link with malware. </P>
		<h2>User Story</h2>
		<p>As a user I want to see news updates and to discuss many topics.</p>
		<h2>User Case</h2>
		<ul>
			<li>Title: Reddit </li>
			<li>Scenerio: Adam wants to comment on a certain post.</li>
			<li>Redditors: Users who read, subscribe, and contribute.</li>
		</ul>
		<h2>Interaction Flow</h2>
		<ol>
			<li>Adam logs in to account.</li>
			<li>The site logs Adam in.</li>
			<li>Adam searches for a specific subreddit through the search bar.</li>
			<li>The site loads many subreddits and displays them.</li>
			<li>Adam clicks on a subreddit.</li>
			<li>The site loads trending posts.</li>
			<li>Adam clicks on a post.</li>
			<li>The site loads the post and displays it.</li>
			<li>Adam clicks the button to comment.</li>
			<li>The site displays a field to type comment.</li>
			<li>Adam clicks submit.</li>
			<li>The site saves comment and displays it in the thread.</li>
		</ol>
		<h2>Conceptual Model</h2>
		<h2>
			<img src="php/images/erd_ddp.svg" alt="Kiwi standing on oval">
		</h2>
		<h2>Profile</h2>
		<ul>
			<li>profileId</li>
			<li>profileActivationToken</li>
			<li>profileAtHandle</li>
			<li>profileEmail</li>
			<li>profileHash</li>
			<li>profilePhone</li>
			<li>profileSalt</li>
		</ul>
		<h2>Comment</h2>
		<ul>
			<li>commentId</li>
			<li>commentProfileId</li>
			<li>commentContent</li>
			<li>commentDate</li>
		</ul>
		<h2>Post</h2>
		<ul>
			<li>postProfileId</li>
			<li>postCommentId</li>
			<li>postDate</li>
		</ul>
		<h2>Relations</h2>
		<ul>
			<li>One user can post many times.(1-n)</li>
			<li>One user can comment on many posts. (1-n)</li>
			<li>One post can have many comments. (1-n)</li>
		</ul>
		<p></p>
	</body>
</HTML>