<?php
// Define the basic layout.
// view:: is a synonym for an absolute path to the /src/View Folder.
$this->layout('view::Layout/layout.html.php');

// load assets like this.
// start insertion into the html file @section assets
$this->start('assets');

// load asset with the asset function
echo asset('view::Example/example.js');
echo asset('view::Example/example.css');
// end insertion into the html file
$this->end('assets');
?>
<!-- HTML goes here  -->
<p>Hallo Welt</p>
<!-- Access template variables like this: -->
<p>Wie geht es <?= $this->v('userName')?></p>