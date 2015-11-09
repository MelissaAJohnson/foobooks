<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    # Instantiate a new Book Model object
	$book = new \App\Book();

	# Set the parameters
	$book->title = 'Harry Potter';
	$book->author = 'J.K. Rowling';
	$book->published = 1997;
	$book->cover = 'http://prodimage.images-bn.com/pimages/9780590353427_p0_v1_s484x700.jpg';
	$book->purchase_link = 'http://www.barnesandnoble.com/w/harry-potter-and-the-sorcerers-stone-j-k-rowling/1100036321?ean=9780590353427';

	# Invoke the Eloquent save() method
	# This will generate a new row in the `books` table, with the above data
	$book->save();

	echo 'Added: '.$book->title;

}
