@extends('layouts.master')

@section('tagTitle')
    Project Description
@endsection


@section('content')
    <h2>Laravel Versus Node.js</h2>
    <p>
        

        While both PHP and node.js can manage any complex application, they are built around different concepts and architectures.<br>
        
        Node itself runs V8 JavaScript. The V8 JavaScript engine is the underlying JavaScript engine Google uses for its Chrome browser. Google used V8 to create an ultra-fast interpreter written in C++ that has another unique feature: you can download the engine and embed it in any application. The V8 JavaScript engine is not limited to running in a single browser. Therefore, Node.js will actually use the V8 JavaScript engine written by Google and rebuild it for use on the server. Thus, I would like to choose Node.js instead of Laravel. The asynchronous I/O of node.js is completed by the callback function, which sends an event when it encounters an I/O request and when the I/O operation is completed To the event queue, and node.js's event loop checks to see if there's an unprocessed event in the queue until the end of the program. The node.js program begins with the event loop and ends with the event loop.<br>
        
        Advantages of Node.js: <br>
        1.	Adopt event-driven, asynchronous programming, designed for network services. In fact, the anonymous function and closure feature of Javascript is very suitable for event-driven and asynchronous programming. And JavaScript is easy to learn, and many front-end designers can quickly get started designing. <br>
        2.	Node.js non-blocking mode IO processing brings high performance and superior load capacity to Node.js under low system resource consumption and is very suitable for use as a middle layer service that depends on other IO resources. <br>
        3.	Node.js is lightweight and efficient, and can be considered as the perfect solution for real-time application systems in data-intensive distributed deployment environments. Node is ideal for situations where you expect high traffic before responding to the client, but the server-side logic and processing required is not necessarily a lot. <br>
        
        In term of Laravel, the code is relatively easy to understand, similar to the English sentence, the keyword is a function, for example, get all the data of a table in the database: <br>
        <i>
        $article=new Article; <br>
        $articles=$article->all(); //This gets all the fields of all the records in the articles table; <br>
        $count = $article->where('class_id','=', 1)->count(); //Is it clear that I understand the meaning? Find records with a classification id of 1. <br>
        </i>
        Furthermore, the documentation is very rich, and the community is also very active, and now it has the highest share in the world. All the questions can find the answer. Moreover, large number of third-party open source libraries (composer included more than 5,500 packages), can quickly and easily implement the module function, third-party excellent package official has a detailed manual. For example: laravel/collective. The security mechanism is very complete, submit the form of data verification (verification has almost 80 kinds, can basically think of), when the data is submitted to generate random _token verification, to avoid illegal submission, can avoid cross-domain attacks. Middleware and routing, filtering and control access and determining the legality of the request before calling the function class and method are used to avoid illegal requests.<br>


    </p>
    

    

@endsection