<?php
// $HeadURL: https://christopher@svn.horrell.ca/svn/code/cwh_link_to_next/cwh_link_to_next.php $
// $LastChangedRevision: 46 $
// $LastChangedDate: 2010-07-02 00:30:16 -0400 (Fri, 02 Jul 2010) $

// This is a PLUGIN TEMPLATE.

// Copy this file to a new name like abc_myplugin.php.  Edit the code, then
// run this file at the command line to produce a plugin for distribution:
// $ php abc_myplugin.php > abc_myplugin-0.1.txt

// Plugin name is optional.  If unset, it will be extracted from the current
// file name. Uncomment and edit this line to override:
$plugin['name'] = 'cwh_link_to_next';

$plugin['version'] = '0.1';
$plugin['author'] = 'Christopher Horrell';
$plugin['author_uri'] = 'http://horrell.ca/';
$plugin['description'] = 'A replacement tag for <txp:link_to_next /> that includes the ability to set the output format as a <link> tag.';

// Plugin types:
// 0 = regular plugin; loaded on the public web side only
// 1 = admin plugin; loaded on both the public and admin side
// 2 = library; loaded only when include_plugin() or require_plugin() is called
$plugin['type'] = 0; 


@include_once('zem_tpl.php');

if (0) {
?>
# --- BEGIN PLUGIN HELP ---
This is a replacement tag for @<txp:link_to_next />@ that includes a new _format_ attribute which provides the ability to set the link format as a @<link>@ tag suitable for placing in the @<head>@ of any individual article page on your site. You can do this by setting the _format_ attribute like so:

@<txp:cwh_link_to_home title="Home" format="link" />@

which will produce something similar to:

@<link rel="next" href="http://example.com/article/2/next-post" title="Next Post" />@

Note that when used as a single tag without the _format_ attribute specified:

@<txp:cwh_link_to_next />@ 

it will produce a plain text link much in the same way as @<txp:link_to_next />@:

@http://example.com/article/2/next-post@


Finally, it can also be used as a container tag in the same manner as @<txp:link_to_next />@ if no _format_ value is specified:

@<txp:cwh_link_to_next> ...Text or Tag... </txp:cwh_link_to_next>@

If you do specify a _link_ value for the _format_ attribute while used as a container tag, it will still produce a @<link>@ tag.

This tag also shares all of the same attributes as @<txp:link_to_next />@. For a complete list of applicable attributes, see "this Textbook entry":http://textbook.textpattern.net/wiki/index.php?title=Txp:link_to_next.

For a further explanation of the benefits of using @<link>@ tags for your site's navigation, please see "Day 9: Providing additional navigation aids":http://diveintoaccessibility.org/day_9_providing_additional_navigation_aids.html from Mark Pilgrim's "
Dive Into Accessibility":http://diveintoaccessibility.org/.

# --- END PLUGIN HELP ---
<?php
}

# --- BEGIN PLUGIN CODE ---

// Plugin code goes here.  No need to escape quotes.


function cwh_link_to_next($atts, $thing)
{
	global $id, $next_id, $next_title;

	extract(lAtts(array(
		'format'     => '', // new format attribute
		'showalways' => 0,
	), $atts));

	if (intval($id) == 0)
	{
		global $thisarticle, $s;

		extract(getNextPrev(
			@$thisarticle['thisid'],
			@strftime('%Y-%m-%d %H:%M:%S', $thisarticle['posted']),
			@$s
		));
	}

	if ($next_id)
	{
		$url = permlinkurl_id($next_id);

			if ($format == 'link')
            {
        		return '<link rel="next" href="'.$url.'"'.
            		($next_title != $thing ? ' title="'.$next_title.'"' : '').' />';
        	}

            
            elseif ($thing)
            {
                $thing = parse($thing);
                
                return '<a rel="next" href="'.$url.'"'.
    			    ($next_title != $thing ? ' title="'.$next_title.'"' : '').
    				'>'.$thing.'</a>';
            }
	
            return $url;
	}
     return ($showalways) ? parse($thing) : '';
}

# --- END PLUGIN CODE ---

?>
