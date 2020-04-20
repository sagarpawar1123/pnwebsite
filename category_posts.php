<DOCTYPE HTML>
<html>
<head>
<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-300">
<!-- Three columns -->
<div class="flex mb-4">
<!-- Left SideBar -->
    <div class="lg:w-1/4">
        <div class="bg-gray-300">
        <a href="#"><div class="text-gray-700 rounded bg-white px-6 py-2 m-2">Power Newz</div></a>
        <a href="#"><div class="text-gray-700 bg-white rounded px-6 py-2 m-2">About</div></a>
        <a href="#"><div class="text-gray-700 bg-white rounded px-6 py-2 m-2">What we serve ?</div></a>
        <a href="#"><div class="text-gray-700 bg-white rounded px-6 py-2 m-2">Content Related</div></a>
        <a href="#"><div class="text-gray-700 bg-white rounded px-6 py-2 m-2">Privacy Policy</div></a>
        <a href="#"><div class="text-gray-700 bg-white rounded px-6 py-2 m-2">Terms & Conditions</div></a>
        <a href="#"><div class="text-gray-700 bg-white rounded px-6 py-2 m-2">Copy Rights</div></a>
        </div>
    </div>
 <!-- End of Left Sidebar -->
 <!-- Post List --> 
<div class="lg:w-2/4 bg-gray-300">
    <div class="rounded-lg">
        <div class="w-full overflow-hidden rounded-lg shadow-md bg-white clearfix">
            <div class="mx-2">
            
                <img src="" id="" class="float-left" alt="Power Newz"/>
                <span class="shadow bg-gray-200 rounded-md text-md font-semibold text-orange-600 my-1 float-right"></span>
                <h3 class="font-semibold"></h3>
                <p></p>
            </div>
            <div class="w-full flex-none bg-cover text-center overflow-hidden my-4 py-2" style="backgroundImage: url(background)" title="PowerNewz"></div>
            <div class="px-2">
                <h4 class="font-semibold">Title</h4>
            </div>
            <div class="px-2 py-2">
                <p class="text-gray-700 text-base">Description</p>
            </div>
            <div class="px-2 py-2">
                <ul class="flex list-none">
                    <li class="flex-1">
                        <ul>
                            <li class="float-left flex-1">
                                <i class="material-icons .md-18 orange900"
                                    style={styles.innerListItems}
                                    onClick={this.handleUpVoteClick}>thumb_up_alt</i>
                            </li>
                            <li class="float-left flex-1">
                                56
                            </li>
                        </ul>
                    </li>

                    <li class="flex-1">
                        <ul>
                            <li class="float-left flex-1">
                                <i class="material-icons orange900">remove_red_eye</i>
                            </li>
                            <li class="float-left flex-1">
                                10
                            </li>
                        </ul>
                    </li>

                    <li class="flex-1">
                        <ul>
                            <li class="float-left flex-1">
                                <i class="material-icons orange900">comment</i>
                            </li>
                            <li class="float-left flex-1">
                                2
                            </li>
                        </ul>
                    </li>

                    <li class="flex-1" style={styles.outerListItems}>
                        <ul>
                            <li class="float-left flex-1">
                                <i class="material-icons orange900">share</i>
                            </li>
                            <li class="float-left flex-1">
                                1
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="bg-gray-200">
                <form>
                    <div class="flex rounded-lg overflow-hidden">
                        <div class="bg-blue-light p-3">
                            <div class="">
                                <i class="material-icons md-18 orange900 float-left" style={styles.innerListItems}>comment</i>
                            </div>
                        </div>
                        <input class="w-full bg-gray-200 px-2 text-gray-700 leading-tight focus:outline-none focus:bg-gray-100" id="full-name" type="text" placeholder="Write Something" />
                        <div class="bg-blue-light p-3">
                            <div class="">
                                <i class="material-icons md-18 orange900" style={styles.innerListItems}>send</i>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End of Post List --> 
<!-- Right SideBar -->
<div class="lg:w-1/4 bg-gray-300 h-12">
    <div class="bg-gray-300">
    <?php
    $url = "https://api.powernewz.com/api/v2/categories";
    $arr = file_get_contents($url);
    $arrValue = json_decode($arr,true);

    $status = $arrValue["status"];
    $categoryArray = $arrValue["categories"];
   
    foreach($categoryArray as $key => $value){
        $categoryName =  $value["name"];
        $categoryId = $value["id"];
        $active = $value["active"];
        $type = $value["value"];

        $catUrl = "category_posts.php?id=".$categoryId;

        echo "<a href='".$catUrl."'><div class='text-gray-700 rounded bg-white px-6 py-2 m-2'>".$categoryName."</div></a>";
    }
    ?>
       
    </div>
</div>
  <!-- End of Left SideBar -->
</div>
</body>
</html>