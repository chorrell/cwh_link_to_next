cwh_link_to_next
================

cwh_link_to_next is a [Textpattern](http://textpattern.com) plugin that provides a  replacement tag for `<txp:link_to_next />` that includes a new _format_ attribute which provides the ability to set the link format as a `link` tag suitable for placing in the `head` of any individual article page on your site. You can do this by setting the _format_ attribute like so:

```html
<txp:cwh_link_to_next title="Next" format="link" />
```

which will produce something similar to:

```html
<link rel="next" href="http://example.com/article/2/next-post" title="Next Post" />
```

Note that when used as a single tag without the _format_ attribute specified:

```html
<txp:cwh_link_to_next />
```

if will produce a plain text link much in the same way as `<txp:link_to_next />`:

```text
http://example.com/article/2/next-post
```

Finally, it can also be used as a container tag in the same manner as `<txp:link_to_next />` if no _format_ value is specified:

```html
<txp:cwh_link_to_next> ...Text or Tag... </txp:cwh_link_to_next>
```

If you do specify a _link_ value for the _format_ attribute while used as a container tag, it will still produce a `link` tag.

This tag also shares all of the same attributes as `<txp:link_to_next />`. For a complete list of applicable attributes, see [this Textbook entry](http://textbook.textpattern.net/wiki/index.php?title=Txp:link_to_next).

For a further explanation of the benefits of using `link` tags for your site's navigation, please see [Day 9: Providing additional navigation aids](http://diveintoaccessibility.org/day_9_providing_additional_navigation_aids.html) from Mark Pilgrim's [Dive Into Accessibility](http://diveintoaccessibility.org/).

Installation
------------

Download `cwh_link_to_next.txt` from the
[latest release](https://github.com/chorrell/cwh_link_to_next/releases/latest),
then paste its contents into the _Install plugin_ box under Admin → Plugins in
Textpattern.

Releases
--------

Releases are automated with
[release-please](https://github.com/googleapis/release-please). PR titles use
[conventional commits](https://www.conventionalcommits.org/) (`feat:`, `fix:`,
`docs:`, etc.; add `!` for breaking changes). After a releasable merge,
release-please opens a release PR that bumps the version and updates
`CHANGELOG.md`. Merging it tags the release, and the workflow attaches
`cwh_link_to_next.txt` and a zip to the GitHub release.

To build the installer yourself, run `php cwh_link_to_next.php > cwh_link_to_next.txt`.

Pre-commit hooks
----------------

This repo uses [pre-commit](https://pre-commit.com/) to catch issues (syntax
errors, secrets, markdown lint failures, etc.) before they're committed. Some
hooks (markdownlint, the PHP syntax check) run in Docker, so Docker must be
running, but PHP doesn't need to be installed locally:

```bash
pip install pre-commit   # or: brew install pre-commit
pre-commit install
pre-commit run --all-files
```
