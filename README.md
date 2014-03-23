cwh_link_to_next
================

cwh_link_to_next is a Textpattern plugin that provides a  replacement tag for `<txp:link_to_next />` that includes a new _format_ attribute which provides the ability to set the link format as a `link` tag suitable for placing in the `head` of any individual article page on your site. You can do this by setting the _format_ attribute like so:

```
<txp:cwh_link_to_next title="Next" format="link" />
```

which will produce something similar to:

```
<link rel="next" href="http://example.com/article/2/next-post" title="Next Post" />
```

Note that when used as a single tag without the _format_ attribute specified:

```
<txp:cwh_link_to_next />
```

if will produce a plain text link much in the same way as `<txp:link_to_next />`:

```
http://example.com/article/2/next-post
```

Finally, it can also be used as a container tag in the same manner as `<txp:link_to_next />` if no _format_ value is specified:

```
<txp:cwh_link_to_next> ...Text or Tag... </txp:cwh_link_to_next>
```

If you do specify a _link_ value for the _format_ attribute while used as a container tag, it will still produce a `link` tag.

This tag also shares all of the same attributes as `<txp:link_to_next />`. For a complete list of applicable attributes, see [this Textbook entry](http://textbook.textpattern.net/wiki/index.php?title=Txp:link_to_next).

For a further explanation of the benefits of using `link` tags for your site's navigation, please see [Day 9: Providing additional navigation aids](http://diveintoaccessibility.org/day_9_providing_additional_navigation_aids.html) from Mark Pilgrim's [Dive Into Accessibility](http://diveintoaccessibility.org/).