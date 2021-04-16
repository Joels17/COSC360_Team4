<head>
    <title>Create Blog Post</title>
    <link rel= "stylesheet" href="createBlog.css">
</head>
<body>
    <?php
		include "header.php";
	?>
    <h2 id="createBlog-title">Create your blog post</h2>
    <form action="./scripts/createBlog_script.php" method="POST" enctype="multipart/form-data">
    <div class="form-master">

    <label for="blogTitle" class="blogTitle-label"><span class = "content">Title:</span> </label>
    <input placeholder = "Blog Title" type="text" name = "blogTitle" id="blogTitle" required >


    <label for="blogBody" class="blogBody-label"><span class = "content">Body:</span> </label>
    <textarea id="blogBody" name="blogBody" rows="20" cols="100" placeholder="Blog Body" required></textarea>

    
    <button type = "submit" class = "submit"> <span class="button-content"> Create </span>
    </div>
    </form>
    
</body>