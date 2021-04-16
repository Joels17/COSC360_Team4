<head>
    <title>Create Blog Post</title>
</head>
<body>
    <div class="form-master">
    <form action="./scripts/createBlog_script.php" method="POST" enctype="multipart/form-data">


    <div class ="blogTitle">
    <input placeholder = "Blog Title" type="text" name = "blogTitle" id="blogTitle" required >
    <label for="blogTitle" class="blogTitle-label"><span class = "content">Title:</span> </label>
    </div>

    <div class="spacer"></div>

    <div class ="blogBody">
    <textarea id="blogBody" name="blogBody" rows="4" cols="50">Blog Body</textarea>
    <label for="blogBody" class="blogBody-label"><span class = "content">Body:</span> </label>
    </div>

    <div class="spacer"></div>

    <div class = "links">
    <button type ="submit" class="createBlog">Create</button>
    </form>
    </div>
</body>