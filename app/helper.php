<?php 
function bannerSize(){
	$bannerSize = array("468 x 60","728 x 90","336 x 280","300 x 250","250 x 250","160 x 600","120 x 600","120 x 240","240 x 400","234 x 60","180 x 150","125 x 125","120 x 90","120 x 60","88 x 31");
	return $bannerSize;
}

function getCategoryName(array $categories, ?string $search)
            {
                $filtered = array_filter($categories, function ($cat) use ($search) {
                    return intval($cat['id']) == intval($search) ? true : false;
                });
            
                $match = null;
            
                foreach ($filtered as $key => $value) {
                    $match = $value;
                    break;
                }
            
                return ucfirst($match['category_name']);
            }
?>