<p><?php
$path = $_SERVER["PHP_SELF"];
$tree = split("/",$path);
$breadcrumb = "";

if (count($tree)==4 && $tree[3]=="index.php") { // First, check if we are on the home page
    $breadcrumb = "Home";
} else { // If not, then first put a link to the homepage
    $breadcrumb = "<a href=\"".SITE_PATH."\">Home</a>";
    for ($i=4; $i<count($tree); $i++) { // Now step through each level adding a link, until we reach an actual file
        if (strstr($tree[$i],".")) { // Found a file (i.e. it has a fullstop character in it)
            if ($tree[$i]!="index.php") { // If it is not the index page of the current folder, print the name
                $pagename = split("\.",$tree[$i]);
                $breadcrumb = $breadcrumb . " &gt; " . ucwords(str_replace("-"," ",$pagename[0]));
            }
        } else { // Found another directory, so provide a link to the top level...
            if ($tree[$i+1]=="index.php") { // ...unless the next one down is the index page
                $breadcrumb = $breadcrumb . " &gt; " . ucwords(str_replace("-"," ",$tree[$i]));
            } else {
                $breadcrumb = $breadcrumb . " &gt; <a href=\""; // Add the arrow between nodes
                for ($j=1; $j<=$i; $j++) { // Add the right link depth to the actual link
                    $breadcrumb = $breadcrumb . "/" . ucwords(str_replace("-"," ",$tree[$j]));
                }
                $breadcrumb = $breadcrumb . "/\">" .ucwords(str_replace("-"," ",$tree[$i])) . "</a>";
            }
        }
    }
}
echo $breadcrumb; // Print the final breadcrumb trail to the page
?></p>