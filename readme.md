<h1 align="center">Review Application</p></h1>

## Introduction

This application is to build the foundation for a review application. This application
stores and display user reviews for electronic products. 


## Details 

The implementation use Laravel’s migrations, seeders, models, ORM/Eloquent, route, controllers, validator, and view/blade. The can application now provides user authentication. So it provides facility for user registration and user login. The following data for a user must be stored:
<ul>
    <li>Email (which will also be their username)</li>
    <li>Password</li>
    <li>Fullname</li>
    <li>Date of birth</li>
    <li>Type (regular user or moderator)</li>
</ul>

The user should be able to login (or get to the login page) from any page. A logged in user should be able to log out. After register, login, or logout, appropriate redirection should be provided. E.g. if user logs in from the details page, then after user completes the login, s/he should be redirected back to that page.
2. There are two types of users: moderator, and regular users. Moderators can perform CRUD operations on all items and reviews. Regular users have restricted access as described below. Also see the permission tables (below) for a summary of permissions.
3. The basis for the review website is item and review. The following is the basic access control requirements:

<strong>Create</strong>
<ul>
    <li>An item can be created by any user (no log in is required). An item must contain the item name, manufacture/business name, and description for that item. The item name must be unique. An URL can be stored for an item (users have the option of entering the URL or not). Only valid URL will be accepted.</li>
    <li>A review is for an item and posted by a logged in user. A review must contain a creation date, a rating (e.g. a number between 1 to 5), and the review (text). A user can only post at most one review per item. After a new review is posted, the user will be redirected to the page containing the newly posted review.</li>
</ul>

<strong>Retrieve</strong>
<ul>
    <li>There should be a page that lists all items, and allow user to click on an item to show the detail page for that item.</li>
    <li>The details page should show all the information for that item, in addition it also displays all reviews for that item. When displaying review, all information for that review should be displayed. In addition, the name of the user who posted that review must also be displayed.</li>
    <li>Users can select to display reviews order by date (i.e. the latest review at the top of the page), or order by rating (i.e. the review with the highest rating is at the top of the page).</li>
</ul>
<strong>Update</strong>
<ul>
    <li>An item can only be edited by moderators.</li>
    <li>A review can only be edited by the poster and moderators. </li>
</ul>
<strong>Delete</strong>
<ul>
    <li>Only moderators can delete items. When an item is deleted, all reviews for that item should also be deleted.</li>
    <li>A review can only be deleted by the poster and moderators.</li>
</ul>
Other features related to CRUD I must implement are:
<ul>
    <li>Input validation must be performed. If invalid input is detected, the appropriate error message must be displayed, along with the previous entered value.</li>
    <li>Access control: actions that cannot be performed by user should not be displayed (e.g. if a user is not logged in, s/he should not see the form for posting a review, and a user should not see the edit button/link for the reviews they cannot edit etc). Appropriate access control checks should also be implemented on the server before performing an operation.</li>
</ul>

4. Pagination must be used to paginate reviews; where there are more than 5 reviews for an item (at least one item must have more than 5 reviews).
5. Users can upload their photos of an item. An item may have many photos uploaded by different users. These photos will be displayed in the details pages for that item. When displaying a photo the name of the user who uploaded the photo should also be displayed. Only logged in user can upload item photos. (Note: partial mark will be awarded if you allow only ONE photo per item.)
6. Users can vote to like or dislike reviews. Reviews that have more dislike than like would be displayed differently than the reviews with more likes than dislikes (you can decide how to display them differently). A user can only vote for a review once. As reviews are often retrieved, the implementation should be optimised for efficiency of retrieval of review (possibly at the expense of using more storage space).
7. A user can “follow” and “unfollow” reviewers/users. By following other reviewers, the currently logged in users can:

<ul>
    <li>See a list of people the s/he has followed, and</li>
    <li>See a list of reviews posted by the reviewer s/he has followed. For each review, the item which the review is for should also be indicated.</li>
</ul>

8. Moreover it also provides:

<ul>
    <li>Items the current logged in user may like.</li>
    <li>Reviewers the current logged in user may want to follow.</li>
</ul>

## Technical Requirements
<ul>

<li>Use Laravel’s migration for database table creation.</li>
<li>Use Laravel’s seeder to insert default test data into the database. There should be enough initial data to thoroughly test the retrieval, update, and deletion functionalities I have implemented.</li>
<li>Use Laravel’s ORM/Eloquent to perform database operations. </li>
<li>Proper security measures must be implemented. </li>
<li>Good coding practice.</li>

</ul>

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
