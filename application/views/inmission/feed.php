<?php echo '<?xml version="1.0" encoding="utf-8"?>' . "\n";?>
<rss version="2.0"
    xmlns:dc="http://purl.org/dc/elements/1.1/"
    xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
    xmlns:admin="http://webns.net/mvcb/"
    xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
    xmlns:content="http://purl.org/rss/1.0/modules/content/"    
    >
    <channel>
        <title><?php echo xml_convert($channel->title); ?></title>
        <link><?php echo $channel->link; ?></link>    
        <description><?php echo xml_convert($channel->description); ?></description>
        <dc:language><?php echo $channel->language; ?></dc:language>
        <?php foreach ($items as $item):?>  
            <item>
              <title><?php echo xml_convert($item->title); ?></title>
              <link><?php echo xml_convert($item->link) ?></link>
              <description><?php echo xml_convert($item->body); ?></description> 
              <category><?php echo xml_convert($item->category_id); ?></category>
              <?php $date = date_create($item->post_on);?>
              <pubDate><?php echo date_format($date,'D, d M Y G:i:s '.'+010O'); ?></pubDate>
            </item>
        <?php endforeach;?>
    </channel>
</rss>