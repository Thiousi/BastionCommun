<?php

/*

---------------------------------------
License Setup
---------------------------------------

Please add your license key, which you've received
via email after purchasing Kirby on http://getkirby.com/buy

It is not permitted to run a public website without a
valid license key. Please read the End User License Agreement
for more information: http://getkirby.com/license

*/

c::set('license', 'put your license key here');

/*

---------------------------------------
Kirby Configuration
---------------------------------------

By default you don't have to configure anything to
make Kirby work. For more fine-grained configuration
of the system, please check out assert_options(what)

*/



c::set('roles', array(
  array(
    'id'      => 'admin',
    'name'    => 'Admin',
    'default' => true,
    'panel'   => true
  ),
  array(
    'id'      => 'membre',
    'name'    => 'Membre',
    'panel'   => false
  ),
  array(
    'id'      => 'visiteur',
    'name'    => 'Visiteur',
    'panel'   => false
  )
));

/* Heures et dates */
c::set('date.handler', 'strftime'); 

c::set('timezone','Europe/Paris'); 
setlocale (LC_TIME, 'fr_FR.utf8','fra'); 

c::set('relativedate.threshold', 86400*30*12);
c::set('relativedate.length', 2);
c::set('relativedate.conjunction', 'et');
c::set('relativedate.fuzzy', true);
c::set('relativedate.lang', 'fr');

/*

---------------------------------------
Kirby Comments
---------------------------------------

https://github.com/vladstudio/vladstudio-kirby-comments

*/

// enable/disable comments globally, true/false
c::set('comments.enabled', true);

// patterns for pages with comments (required)
// relative to "content/" folder, f.e.: array('blog/*')
c::set('comments.include.pages', array('*') );

// patterns for pages without comments (optional)
// relative to "content/", f.e.: array('blog/*')
c::set('comments.exclude.pages', array() );

// Show Gravatar images?
// false or size in pixels (f.e. 32)
c::set('comments.gravatar', false); 

// filename for saving comments
c::set('comments.data.filename', 'comments.json');

// format for post date: see http://php.net/date
c::set('comments.date.format', '%A %d %B %Y');

// install Amazon SES plugin and provide your email for notifications
c::set('comments.notify.email', '');

// when someone posts a comment, save name/email in cookie?
c::set('comments.save_author_in_cookie', true);


