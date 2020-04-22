<DOCTYPE HTML>
    <html>

    <head>
        <link href="css/tailwind.css" rel="stylesheet">
        <!-- <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"> -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="css/fontawesome/css/all.css" rel="stylesheet">
        <style>

        </style>
    </head>

    <body class="bg-gray-300">
        <!-- Three columns -->
        <div class="container m-auto clearfix flex mb-4">
            <!-- Left SideBar -->
            <div class="lg:w-1/4">
                <div class="bg-gray-300">
                    <a href="index.php">
                        <div class="text-gray-700 rounded bg-white px-6 py-2 m-2">Power Newz</div>
                    </a>
                    <a href="#">
                        <div class="text-gray-700 bg-white rounded px-6 py-2 m-2">About</div>
                    </a>
                    <a href="#">
                        <div class="text-gray-700 bg-white rounded px-6 py-2 m-2">What we serve ?</div>
                    </a>
                    <a href="#">
                        <div class="text-gray-700 bg-white rounded px-6 py-2 m-2">Content Related</div>
                    </a>
                    <a href="#">
                        <div class="text-gray-700 bg-white rounded px-6 py-2 m-2">Privacy Policy</div>
                    </a>
                    <a href="#">
                        <div class="text-gray-700 bg-white rounded px-6 py-2 m-2">Terms & Conditions</div>
                    </a>
                    <a href="#">
                        <div class="text-gray-700 bg-white rounded px-6 py-2 m-2">Copy Rights</div>
                    </a>
                </div>
            </div>
            <!-- End of Left Sidebar -->
            <!-- Post List -->
            <div class="lg:w-2/4 bg-gray-300">
                <?php
                $categoryId = $_GET["id"];
                // $url = "https://powernewz.com/api/v2/posts";
                // $arr = file_get_contents($url);
                // $arrValue = json_decode($arr, true);
                // $arrPost = $arrValue["posts"];
                // $postCount = count($arrPost);

                $postUrl = "https://api.powernewz.com/api/v2/categories/" . $categoryId . "/posts";
                $postArr = file_get_contents($postUrl);
                $postArrValue = json_decode($postArr, true);
                $status = $postArrValue["status"];
                $postArray = $postArrValue["posts"];

                foreach ($postArray as $key => $value) {
                    $id =  $value["id"];
                    $description = $value["description"];
                    $screenshot = $value["screenshot"];
                    $viewcount = $value["viewcount"];
                    $upVoteCount = $value["up_votes_count"];
                    $commentsCount = $value["comments_count"];
                    $images = $value["images"];
                    $categories = $value["categories"];
                    $location = $value["location"];
                    $comments = $value["comments"];
                    $videos = $value["videos"];
                    $files = $value["files"];
                    $user = $value["user"];

                    foreach ($images as $key => $value) {
                        $imageId = $value["id"];
                        $imagePostId = $value["post_id"];
                        $imageFileName = $value["filename"];
                        $imagePublicId = $value["public_id"];
                    }
                    foreach ($categories as $key => $value) {
                        $categoryId = $value["id"];
                        $categoryName = $value["name"];
                        $categoryDescription = $value["description"];
                        $categoryIcon = $value["icon"];
                        $categoryActive = $value["active"];
                        $categoryType = $value["type"];
                        $categoryImage = $value["image"];
                    }

                    // foreach ($comments as $key => $value) {
                    // 	$categoryName = $value["name"];
                    // }
                    // foreach ($videos as $key => $value) {
                    // 	$categoryName = $value["name"];
                    // }
                    // foreach ($files as $key => $value) {
                    // 	$categoryName = $value["name"];
                    // }

                ?>
                    <div class="rounded-lg flex m-2">
                        <div class="w-full overflow-hidden rounded-lg shadow-md bg-white clearfix">
                            <div class="mx-2 my-2">
                                <img src="https://lh3.googleusercontent.com/YTb_Kh5vJMdGQnsRQOH60SF6OC6pYKC4AOq538efK6zfHdY_5KF-q0XDuwi_-tQyDQ=s180-rw" id="" class="float-left" width="50" alt="Power Newz" />
                                <span class="shadow bg-gray-200 rounded-md text-md font-semibold text-orange-600 my-1 float-right" style="padding: 5px 20px"><?php echo $categoryName; ?></span>
                                <h3 class="font-semibold"><?php echo $user["name"]; ?></h3>
                                <p><?php echo $location["locality"]; ?></p>
                            </div>

                            <div class="w-full flex-none bg-cover text-center overflow-hidden my-4 py-2" title="PowerNewz" style="background-image: url('<?php echo $imageFileName; ?>'); height:400px; background-size: cover"></div>

                            <div class="px-2 py-2">
                                <p class="text-gray-700 text-base"><?php echo $description; ?></p>
                            </div>
                            <div class="px-2 py-2">
                                <ul class="flex list-none">
                                    <li class="flex-1">
                                        <ul>
                                            <li class="float-left flex-1">
                                                <i class="material-icons .md-18 orange900">thumb_up_alt</i>
                                            </li>
                                            <li class="float-left flex-1">
                                                <?php echo $upVoteCount; ?>
                                            </li>
                                        </ul>
                                    </li>

                                    <li class="flex-1">
                                        <ul>
                                            <li class="float-left flex-1">
                                                <i class="material-icons orange900">remove_red_eye</i>
                                            </li>
                                            <li class="float-left flex-1">
                                                <?php echo $viewcount; ?>
                                            </li>
                                        </ul>
                                    </li>

                                    <li class="flex-1">
                                        <ul>
                                            <li class="float-left flex-1">
                                                <i class="material-icons orange900">comment</i>
                                            </li>
                                            <li class="float-left flex-1">
                                                <?php echo $commentsCount; ?>
                                            </li>
                                        </ul>
                                    </li>

                                    <li class="flex-1">
                                        <ul>
                                            <a href="https://pwnz.co/7KurKuxyR5" target="_blank">
                                                <li class="float-left flex-1">
                                                    <i class="material-icons orange900">share</i>
                                                </li>
                                            </a>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="bg-gray-200">
                                <form>
                                    <div class="flex rounded-lg overflow-hidden">
                                        <div class="bg-blue-light p-3">
                                            <div class="">
                                                <i class="material-icons md-18 orange900 float-left">comment</i>
                                            </div>
                                        </div>
                                        <input class="w-full bg-gray-200 px-2 text-gray-700 leading-tight focus:outline-none focus:bg-gray-100" id="full-name" type="text" placeholder="Write Something" />
                                        <div class="bg-blue-light p-3">
                                            <div class="">
                                                <i class="material-icons md-18 orange900">send</i>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
            <!-- End of Post List -->
            <!-- Right SideBar -->
            <div class="lg:w-1/4 bg-gray-300 h-12">
                <div class="bg-gray-300">
                    <?php
                    $url = "https://api.powernewz.com/api/v2/categories";
                    $arr = file_get_contents($url);

                    $arrValue = json_decode($arr, true);

                    $status = $arrValue["status"];
                    $categoryArray = $arrValue["categories"];

                    foreach ($categoryArray as $key => $value) {
                        $categoryName =  $value["name"];
                        $categoryId = $value["id"];
                        $active = $value["active"];
                        $type = $value["value"];

                        $catUrl = "category_posts.php?id=" . $categoryId;

                        echo "<a href='" . $catUrl . "'><div class='text-gray-700 rounded bg-white px-6 py-2 m-2'>" . $categoryName . "</div></a>";
                    }
                    ?>
                </div>
            </div>
            <!-- End of Left SideBar -->
        </div>



        <script type="text/javascript">
            // $(document).ready(function() {
            // 	$(window).scroll(function() {
            // 		var lastID = $('.load-more').attr('lastID');
            // 		if (($(window).scrollTop() == $(document).height() - $(window).height()) && (lastID != 0)) {
            // 			$.ajax({
            // 				type: 'POST',
            // 				url: 'getData.php',
            // 				data: 'id=' + lastID,
            // 				beforeSend: function() {
            // 					$('.load-more').show();
            // 				},
            // 				success: function(html) {
            // 					$('.load-more').remove();
            // 					$('#postList').append(html);
            // 				}
            // 			});
            // 		}
            // 	});
            // });
        </script>
    </body>

    </html>