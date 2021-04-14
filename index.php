<!DOCTYPE html>
<html>
<head>
    <title>MyBlogPost</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script defer type="text/JavaScript" src="scripts/index.js"></script>
</head>
<body>
    <div class ="header" id="headerContainer">
        <header id="header1">
            <h1>Blog Site</h1>
            <p>Placeholder header</p>
            <nav id="nav">
                <a href="#">Home</a>
                <a href="#">MyBlogPost</a>
                <?php 
                    session_start();
                    if(isset($_SESSION['user'])){
                ?>
                    <a href="login.php">Account</a>
                <?php }else{ ?>
                    <a href="login.php">Login</a>
                <?php } ?>
            </nav>
        </header>
    </div>
    <div class="content">
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec bibendum sem interdum aliquam ornare. Phasellus sed risus metus. Aenean ut lobortis ex. 
            Aenean pharetra mauris eu felis fermentum, nec ultricies ante semper. Donec convallis nec est at accumsan. Vivamus bibendum porta arcu quis commodo. 
            Pellentesque egestas ipsum dolor. Aliquam viverra metus odio, ac interdum urna dignissim placerat. Cras ac elit sit amet mi rutrum laoreet a nec augue.

            Vivamus et elit vel mauris lobortis aliquam. Vivamus iaculis lorem ac tempus ultricies. Phasellus auctor porta arcu, in pulvinar nunc pretium in. 
            Nunc sed risus quis augue varius eleifend. Cras mattis aliquam cursus. Cras et faucibus lacus. Etiam imperdiet vitae magna non ullamcorper.

            Quisque vitae accumsan tortor. Sed placerat, leo non auctor hendrerit, est lectus condimentum ante, ut hendrerit dolor nisl in dolor. 
            Donec sodales euismod eros eu molestie. Nulla ullamcorper tincidunt ipsum sed rutrum. Cras at urna sit amet metus tincidunt hendrerit. 
            In quis egestas metus. Vivamus ac nibh ut lectus fringilla imperdiet ut at tortor. Sed arcu velit, pellentesque vitae cursus vitae, efficitur eget lorem. 
            Vivamus quam est, tempor eget ornare vitae, viverra euismod dolor. Vivamus eu facilisis ex.

            Phasellus non accumsan ex, nec accumsan erat. Sed facilisis lacinia ipsum quis molestie. 
            In pharetra elit nunc, at sodales tortor mollis a. Phasellus vel gravida sapien. 
            Cras id neque eget augue lacinia venenatis. Suspendisse potenti. Proin id sodales diam, dictum bibendum lectus. 
            Curabitur diam tortor, elementum ut tellus ut, aliquam viverra quam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. 
            Donec felis erat, viverra eu quam ac, pellentesque fringilla augue. Vestibulum magna nibh, congue id congue eget, fringilla a diam. 
            Integer lacinia urna ac libero sagittis molestie. Praesent porttitor eros et feugiat ullamcorper. Integer malesuada urna sed lorem laoreet, vitae faucibus nibh mollis. 
            Quisque non risus sed lectus facilisis gravida. Praesent mattis erat et tortor sollicitudin scelerisque.

            Etiam tristique ex magna, eu sagittis tellus mollis sit amet. In faucibus nisi eget tellus iaculis scelerisque. 
            Quisque nulla dolor, commodo sit amet magna et, rutrum congue leo. Fusce luctus ex maximus tortor hendrerit, et fermentum nulla pulvinar. 
            Ut eleifend aliquam lacus, non bibendum massa semper eu. Phasellus rhoncus magna id ex aliquam, quis pharetra dolor convallis. 
            Nam placerat lobortis pellentesque. Nunc vitae tellus lobortis, viverra nulla nec, malesuada mi. Mauris tristique lorem at convallis consequat. 
            Vivamus eu laoreet tellus.

            Pellentesque fermentum leo feugiat orci rhoncus, suscipit pretium leo aliquet. Donec sodales elementum blandit. 
            Donec lobortis metus in efficitur vehicula. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Nam rutrum, 
            ipsum quis mattis mollis, elit orci iaculis leo, quis ultrices mauris leo a arcu. Duis a rutrum erat. Integer ut magna sed mauris aliquet semper in ullamcorper est. 
            Cras aliquet enim purus, a vestibulum neque fringilla nec.

            In id convallis metus. Etiam vel enim mattis, tincidunt justo id, congue ligula. Donec volutpat odio efficitur tempus convallis. 
            In at elit et metus gravida mattis bibendum eget quam. Fusce blandit urna eget placerat ornare. Ut nibh ante, scelerisque in nunc vitae, congue laoreet est. 
            Etiam eu orci eu sem feugiat tincidunt eu at purus. Etiam placerat quis nibh sit amet tempus. Aenean et felis pharetra, convallis turpis ut, vulputate elit. 
            Aliquam erat volutpat. Proin eget magna malesuada, hendrerit mi nec, blandit erat. Ut vel blandit lacus. Sed vitae accumsan magna. 
            Phasellus tempus porttitor nisi, a aliquet nisl porta eu. Cras ultrices dapibus semper. Praesent in pulvinar massa, vitae ultricies sem.

            Nullam quis tortor nec dolor cursus tincidunt. Morbi dolor risus, interdum non accumsan commodo, bibendum vitae ligula. 
            Cras eget erat gravida, consequat mauris eu, condimentum leo. Fusce congue auctor finibus. Mauris in ante et nulla bibendum porttitor. 
            Ut egestas leo enim, nec condimentum neque ullamcorper ut. Morbi tincidunt imperdiet neque eu accumsan. Vivamus eu ipsum in turpis cursus tristique id non metus. 
            Etiam tincidunt erat a massa tristique pulvinar. Donec sit amet nisi erat. Curabitur tempus aliquam finibus. In hac habitasse platea dictumst. 
            Donec sed pharetra lacus, id mattis libero. Vestibulum ac commodo elit, quis facilisis mi. Nullam lacinia sapien id dignissim luctus. 
            Proin sed euismod lorem, at dignissim leo.

            Mauris tortor arcu, laoreet eget nisl quis, molestie viverra tortor. Pellentesque est est, ullamcorper et congue in, vulputate eu nunc. Sed nec urna in turpis tempor eleifend. 
            Donec tincidunt gravida convallis. Fusce ac faucibus erat. Sed pellentesque libero sagittis aliquam luctus. Proin id odio feugiat, viverra velit commodo, feugiat mi. 
            Etiam hendrerit sed nisl eu venenatis. Aenean lobortis sed justo sit amet sodales. Praesent interdum mi at metus accumsan aliquam. In imperdiet quis lectus eu finibus. 
            Sed id luctus est, condimentum lacinia turpis.

            Etiam orci felis, posuere eu varius vel, venenatis tempor magna. Integer sagittis quam ut erat commodo gravida. Sed faucibus iaculis lorem sit amet varius. 
            In accumsan mi vitae lectus sagittis tempor. Morbi gravida lobortis eros, id tristique magna condimentum eget. Pellentesque at rhoncus purus. 
            Nam mollis felis eu tristique finibus. Ut vitae consectetur neque, et tincidunt metus.
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec bibendum sem interdum aliquam ornare. Phasellus sed risus metus. Aenean ut lobortis ex. 
            Aenean pharetra mauris eu felis fermentum, nec ultricies ante semper. Donec convallis nec est at accumsan. Vivamus bibendum porta arcu quis commodo. 
            Pellentesque egestas ipsum dolor. Aliquam viverra metus odio, ac interdum urna dignissim placerat. Cras ac elit sit amet mi rutrum laoreet a nec augue.

            Vivamus et elit vel mauris lobortis aliquam. Vivamus iaculis lorem ac tempus ultricies. Phasellus auctor porta arcu, in pulvinar nunc pretium in. 
            Nunc sed risus quis augue varius eleifend. Cras mattis aliquam cursus. Cras et faucibus lacus. Etiam imperdiet vitae magna non ullamcorper.

            Quisque vitae accumsan tortor. Sed placerat, leo non auctor hendrerit, est lectus condimentum ante, ut hendrerit dolor nisl in dolor. 
            Donec sodales euismod eros eu molestie. Nulla ullamcorper tincidunt ipsum sed rutrum. Cras at urna sit amet metus tincidunt hendrerit. 
            In quis egestas metus. Vivamus ac nibh ut lectus fringilla imperdiet ut at tortor. Sed arcu velit, pellentesque vitae cursus vitae, efficitur eget lorem. 
            Vivamus quam est, tempor eget ornare vitae, viverra euismod dolor. Vivamus eu facilisis ex.

            Phasellus non accumsan ex, nec accumsan erat. Sed facilisis lacinia ipsum quis molestie. 
            In pharetra elit nunc, at sodales tortor mollis a. Phasellus vel gravida sapien. 
            Cras id neque eget augue lacinia venenatis. Suspendisse potenti. Proin id sodales diam, dictum bibendum lectus. 
            Curabitur diam tortor, elementum ut tellus ut, aliquam viverra quam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. 
            Donec felis erat, viverra eu quam ac, pellentesque fringilla augue. Vestibulum magna nibh, congue id congue eget, fringilla a diam. 
            Integer lacinia urna ac libero sagittis molestie. Praesent porttitor eros et feugiat ullamcorper. Integer malesuada urna sed lorem laoreet, vitae faucibus nibh mollis. 
            Quisque non risus sed lectus facilisis gravida. Praesent mattis erat et tortor sollicitudin scelerisque.

            Etiam tristique ex magna, eu sagittis tellus mollis sit amet. In faucibus nisi eget tellus iaculis scelerisque. 
            Quisque nulla dolor, commodo sit amet magna et, rutrum congue leo. Fusce luctus ex maximus tortor hendrerit, et fermentum nulla pulvinar. 
            Ut eleifend aliquam lacus, non bibendum massa semper eu. Phasellus rhoncus magna id ex aliquam, quis pharetra dolor convallis. 
            Nam placerat lobortis pellentesque. Nunc vitae tellus lobortis, viverra nulla nec, malesuada mi. Mauris tristique lorem at convallis consequat. 
            Vivamus eu laoreet tellus.

            Pellentesque fermentum leo feugiat orci rhoncus, suscipit pretium leo aliquet. Donec sodales elementum blandit. 
            Donec lobortis metus in efficitur vehicula. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Nam rutrum, 
            ipsum quis mattis mollis, elit orci iaculis leo, quis ultrices mauris leo a arcu. Duis a rutrum erat. Integer ut magna sed mauris aliquet semper in ullamcorper est. 
            Cras aliquet enim purus, a vestibulum neque fringilla nec.

            In id convallis metus. Etiam vel enim mattis, tincidunt justo id, congue ligula. Donec volutpat odio efficitur tempus convallis. 
            In at elit et metus gravida mattis bibendum eget quam. Fusce blandit urna eget placerat ornare. Ut nibh ante, scelerisque in nunc vitae, congue laoreet est. 
            Etiam eu orci eu sem feugiat tincidunt eu at purus. Etiam placerat quis nibh sit amet tempus. Aenean et felis pharetra, convallis turpis ut, vulputate elit. 
            Aliquam erat volutpat. Proin eget magna malesuada, hendrerit mi nec, blandit erat. Ut vel blandit lacus. Sed vitae accumsan magna. 
            Phasellus tempus porttitor nisi, a aliquet nisl porta eu. Cras ultrices dapibus semper. Praesent in pulvinar massa, vitae ultricies sem.

            Nullam quis tortor nec dolor cursus tincidunt. Morbi dolor risus, interdum non accumsan commodo, bibendum vitae ligula. 
            Cras eget erat gravida, consequat mauris eu, condimentum leo. Fusce congue auctor finibus. Mauris in ante et nulla bibendum porttitor. 
            Ut egestas leo enim, nec condimentum neque ullamcorper ut. Morbi tincidunt imperdiet neque eu accumsan. Vivamus eu ipsum in turpis cursus tristique id non metus. 
            Etiam tincidunt erat a massa tristique pulvinar. Donec sit amet nisi erat. Curabitur tempus aliquam finibus. In hac habitasse platea dictumst. 
            Donec sed pharetra lacus, id mattis libero. Vestibulum ac commodo elit, quis facilisis mi. Nullam lacinia sapien id dignissim luctus. 
            Proin sed euismod lorem, at dignissim leo.

            Mauris tortor arcu, laoreet eget nisl quis, molestie viverra tortor. Pellentesque est est, ullamcorper et congue in, vulputate eu nunc. Sed nec urna in turpis tempor eleifend. 
            Donec tincidunt gravida convallis. Fusce ac faucibus erat. Sed pellentesque libero sagittis aliquam luctus. Proin id odio feugiat, viverra velit commodo, feugiat mi. 
            Etiam hendrerit sed nisl eu venenatis. Aenean lobortis sed justo sit amet sodales. Praesent interdum mi at metus accumsan aliquam. In imperdiet quis lectus eu finibus. 
            Sed id luctus est, condimentum lacinia turpis.

            Etiam orci felis, posuere eu varius vel, venenatis tempor magna. Integer sagittis quam ut erat commodo gravida. Sed faucibus iaculis lorem sit amet varius. 
            In accumsan mi vitae lectus sagittis tempor. Morbi gravida lobortis eros, id tristique magna condimentum eget. Pellentesque at rhoncus purus. 
            Nam mollis felis eu tristique finibus. Ut vitae consectetur neque, et tincidunt metus.
        </p>
    </div>




<footer>

</footer>

</body>
</html>