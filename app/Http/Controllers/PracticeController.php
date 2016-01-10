<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PracticeController extends Controller
{
    function getExample9 () {

        $book = \App\Book::with('author')->first();

        dump($book->toArray());

        echo $book->title;
        echo $book->author->first_name;
    }

    function getExample8() {
        $author = new \App\Author;
        $author->first_name = 'J.K';
        $author->last_name = 'Rowling';
        $author->bio_url = 'https://en.wikipedia.org/wiki/J._K._Rowling';
        $author->birth_year = '1965';
        $author->save();
        dump ($author->toArray());

        $book = new \App\Book;
        $book->title = "Harry Potter and the Philosopher's Stone";
        $book->published = 1997;
        $book->cover = 'http://prodimage.images-bn.com/pimages/9781582348254_p0_v1_s118x184.jpg';
        $book->purchase_link = 'http://www.barnesandnoble.com/w/harrius-potter-et-philosophi-lapis-j-k-rowling/1102662272?ean=9781582348254';
        $book->author()->associate($author); # <--- Associate the author with this book
        $book->save();
        dump($book->toArray());

        $book->save();

        dump($book->toArray());

        return 'Added new book';
    }



    function getExample7() {
        $books = \App\Book::all();
       foreach ($books as $book) {

        echo $book->title;
        }
    }

    // Create example
    function getExample4(){
        $book = new \App\Book();

        $book->title = "Harry Potter";
        $book->author = "J.K. Rowling";

        $book->save();

        return 'Example 4';
    }

    // Delete example
    function getExample5() {
        $book = \App\Book::where('id', '=', 11);

        if($book) {
            $book->delete();
            return 'Book deleted';
        } else {
            return 'Book not found';
        }
    }

    // Update example
    function getExample6() {
        $book = \App\Book::where('author', 'Like', '%Scott%')->get();

        if($book) {
            $book->title = "The Beautiful and Damned";
            $book->save();

            echo "Update complete; check database to verify update";
        } else {
            echo "Book not found, can't update";
        }
    }


    // Read example
    function getBooksWithEloquent() {
        $books = \App\Book::all();

        # Make sure we have results before trying to print them...
        if(!$books->isEmpty()) {

            // Output the books
            foreach($books as $book) {
                echo $book->title.', '.$book->author.'<br>';
            }
        }
        else {
            echo 'No books found';
        }
    }

    function getBooksWithQueryBuilder() {

        $books = \DB::table('books')->get();

        foreach($books as $book) {
            echo $book->title.'<br>';
        }
    }

    function getCreateNewBookWithQueryBuilder() {
        \DB::table('books')->insert([
        'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
        'title' => 'The Great Gatsby',
        'author' => 'F. Scott Fitzgerald',
        'published' => 1925,
        'cover' => 'http://img2.imagesbn.com/p/9780743273565_p0_v4_s114x166.JPG',
        'purchase_link' => 'http://www.barnesandnoble.com/w/the-great-gatsby-francis-scott-fitzgerald/1116668135?ean=9780743273565',
        ]);

        return 'New book added';
    }

}
