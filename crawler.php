<?php

function crawl(){
    require 'vendor/autoload.php';
    $httpClient = new \Goutte\Client();
    $response = $httpClient->request('GET', 'https://books.toscrape.com/');
    // geting required details under relevant headings
    $prices = [];
    $cat_url = '';
    $response->filter('ul.nav li a')->each(function ($node) use (&$prices, &$httpClient,&$cat_url) {
        if($node->text() == 'Science'){
            $cat_url = $node->attr('href');
            // echo $details;
            $newResponse = $httpClient->click($node->link()); 
            $prices = [];
            $newResponse->filter('.row li article div.product_price p.price_color')->each(function ($node) use (&$prices) {
            $prices[] = $node->text();
            });
    
            $title = [];
            $newResponse->filter('.row li article h3 a')->each(function ($node) use (&$title) {
                $title[] = $node->text();
            });
            $rating = [];
            $newResponse->filter('.row li article p.star-rating')->each(function($node) use (&$rating){
                $rating[] = $node->attr('class');
            });
            $stock = [];
            $newResponse->filter('.row li article div.product_price p.instock')->each(function($node) use (&$stock){
                $stock[] = $node->text();
            });
            $url = [];
            $index = 0;
            $newResponse->filter('.row li article h3 a')->each(function($node) use (&$url,&$index){
                $url[] = $node->attr('href');
                // echo $node->attr('href');
                $index++;
            });
            $data = array();
            // echo $index;
            for ($i=0; $i < $index; $i++) { 
                // echo $i+'1'.','.'Science'.','.$cat_url.','.$title[$i].','.$prices[$i].','.$stock[$i].','.$rating[$i].','.$url[$i];
                array_push($data,array(substr(md5(time()), 0, 6).$i*mt_rand(2,10).','.'Science'.','.$cat_url.','.$title[$i].','.$prices[$i].','.$stock[$i].','.$rating[$i].','.$url[$i]));
            }
            $headers = ['id', 'Category', 'CategoryUrl', 'Title', 'Price', 'Stock', 'Rating','Url'];
            $filename = 'science_listing.csv';
            
            // open csv file for writing
            $f = fopen($filename, 'w');
            
            if ($f === false) {
                die('Error opening the file ' . $filename);
            }
            
            // write each row at a time to a file
            fputcsv($f, $headers);
            foreach ($data as $row) {
                fputcsv($f, $row);
            }
            
            // close the file
            fclose($f);
        }    
    
        });

        echo json_encode(['success'=>true],200);
}

    crawl();
?>