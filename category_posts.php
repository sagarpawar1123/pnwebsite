<DOCTYPE HTML>
    <html>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="css/tailwind.css" rel="stylesheet">
        <!-- <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"> -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="css/fontawesome/css/all.css" rel="stylesheet">
        <script defer src="css/fontawesome/js/all.js"></script>
        <script src="js/jquery.min.js"></script>
        <style>
            .left-fixed {
                position: fixed;
                top: 64px;
                left: 3%;
            }

            .right-fixed {
                position: fixed;
                top: 64px;
                right: 3%;
            }

            .center-fixed {
                position: relative;
                left: 25%;
                top: 64px;
            }
        </style>
    </head>

    <body class="bg-gray-300">
        <!--Nav-->
        <nav class="bg-gray-800 p-2 mt-0 fixed w-full z-10 top-0">
            <div class="container mx-auto flex flex-wrap items-center">
                <div class="flex w-full md:w-1/2 justify-center md:justify-start text-white font-extrabold">
                    <a class="text-white no-underline hover:text-white hover:no-underline" href="#">
                        <img class="h-6" height="32" alt="Power Newz" src="https://res.cloudinary.com/powernewz/image/upload/q_auto:eco/v1522696194/powernewz_logo.png" />
                    </a>
                </div>
                <div class="flex w-full pt-2 content-center justify-between md:w-1/2 md:justify-end">
                    <ul class="list-reset flex justify-between flex-1 md:flex-none items-center">
                        <li class="mr-3">
                            <a class="inline-block text-gray-600 no-underline hover:text-gray-200 hover:text-underline py-2 px-4" href="#">KA</a>
                        </li>
                        <!-- <li class="mr-3">
                            <a class="inline-block text-gray-600 no-underline hover:text-gray-200 hover:text-underline py-2 px-4" href="#">link</a>
                        </li> -->
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Three columns -->
        <div class="container m-auto flex mb-4">
            <!-- Left SideBar -->
            <div class="hidden rounded-lg lg:block lg:w-1/4 left-fixed bg-gray-300">
                <div class="bg-gray-300">
                    <a href="#">
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
            <div class="lg:w-2/4 bg-gray-300 center-fixed">
                <div class="post-data-list">
                    <?php
                    $categoryId = $_GET["id"];
                    // echo $categoryId;
                    $postUrl = "https://api.powernewz.com/api/v2/categories/" . $categoryId . "/posts?language=75";
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

                    ?>
                        <div class="li-post-group rounded-lg flex m-2">
                            <div class="w-full overflow-hidden rounded-lg shadow-md bg-white clearfix">
                                <div class="mx-2 my-2">
                                    <img src="https://lh3.googleusercontent.com/YTb_Kh5vJMdGQnsRQOH60SF6OC6pYKC4AOq538efK6zfHdY_5KF-q0XDuwi_-tQyDQ=s180-rw" id="" class="float-left mx-2" width="50" alt="Power Newz" />
                                    <span class="shadow bg-gray-200 rounded-md text-md font-semibold text-orange-600 my-1 float-right" style="padding: 5px 20px"><?php echo $categoryName; ?></span>
                                    <h3 class="font-semibold" style="line-height:1.6"><?php echo $user["name"]; ?></h3>
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

                <div class="show-more load-post" title="More posts">
                    <i class="fas fa-circle-notch fa-spin"></i> Loading...</div>
            </div>
            <!-- End of Post List -->

            <!-- Right SideBar -->
            <div class="hidden rounded-lg lg:block lg:w-1/4 right-fixed bg-gray-300">
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
            $(document).ready(function(e) {
                $showPostFrom = 0;
                $total_records = <?php print_r($postCount); ?>
                $categoryId = <?php print_r($_GET["id"]); ?>

                console.log("category_posts", $categoryId);

                $(window).scroll(function() {
                    $postCount = $('.li-post-group:last').index() + 1;

                    if (($(window).scrollTop() + $(window).height() >= $(document).height())) {
                        $showPostFrom += $postCount;

                        $('.load-post').show();
                        $.ajax({
                            type: 'POST',
                            url: 'load_more_categories.php',
                            data: {
                                'action': 'showPost',
                                'showPostFrom': $showPostFrom,
                                'categoryId': $categoryId
                                // 'showPostCount': $showPostCount
                            },
                            success: function(data) {
                                if (data != '') {
                                    $('.load-post').hide();
                                    $('.post-data-list').append(data).show('slow');
                                } else {
                                    $('.show-more').hide();
                                }
                            }
                        });
                    }
                });
            });
        </script>
    </body>

    </html>