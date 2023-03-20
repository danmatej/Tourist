# Finish the register func
## implement js form verification

# Story page

# story detail page

# user management page

# convert to html pages - separate php and html

#    //implement error message
##    header("Location: index.php?signupsuccess=false");


### create a view for user stories
Assuming that the user_id column in the stories table is a foreign key that references the id column in the users table, you can create a SQL view that joins these two tables and filters the result to show only the stories that are connected with a particular user.

Here's an example SQL view that shows stories connected with a user with ID 123:

sql

CREATE VIEW user_stories AS
SELECT s.id, s.title
FROM stories s
JOIN users u ON s.user_id = u.id
WHERE u.id = 123;

In this view, we join the stories table with the users table on the user_id column and the id column, respectively. We then filter the result to show only the rows where the user_id matches the ID of the user we're interested in (in this case, 123).

You can then query this view to retrieve the stories connected with a particular user:

sql

SELECT * FROM user_stories;

This will return a list of all the stories that are connected with the user with ID 123


### fix the password validation


###
grab stories from db
            // $sql = "SELECT * FROM stories";
            // $result = mysqli_query($db, $sql);
            // $resultCheck = mysqli_num_rows($result);
            // if ($resultCheck > 0) {
            //     while ($row = mysqli_fetch_assoc($result)) {
            //         echo '<div class="col-lg-4 col-sm-6">
            //         <a class="story-box" href="assets/img/stories/fullsize/1.jpg" title="story Name">
            //             <img class="img-fluid" src="assets/img/stories/thumbnails/1.jpg" alt="..." />
            //             <div class="story-box-caption">
            //                 <div class="story-category text-white-50">
            //                     ' . $row['title'] . '
            //                 </div>
            //                 <div class="story-title">story Name</div>
            //             </div>
            //         </a>
            //     </div>';
            //     }
            // }

## og story display
            <div class="col-lg-4 col-sm-6">
                <a class="portfolio-box" href="images/1.jpg">
                    <img class="img-fluid" src="images/1.jpg" alt="..." />
                    <div class="portfolio-box-caption">
                        <div class="story-category text-white-50"><?php //$result.category ?></div>
                        <div class="story-title"><?php //$result.title ?></div>
                    </div>
                </a>
            </div>


implement filtering of stories on stories page by user (click on user will pass user id as arugment)




# scripts
/*!
* Start Bootstrap - Creative v7.0.6 (https://startbootstrap.com/theme/creative)
* Copyright 2013-2022 Start Bootstrap
* Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-creative/blob/master/LICENSE)
*/
//
// Scripts
// 

window.addEventListener('DOMContentLoaded', event => {

    // Navbar shrink function
    var navbarShrink = function () {
        const navbarCollapsible = document.body.querySelector('#mainNav');
        if (!navbarCollapsible) {
            return;
        }
        if (window.scrollY === 0) {
            navbarCollapsible.classList.remove('navbar-shrink')
        } else {
            navbarCollapsible.classList.add('navbar-shrink')
        }

    };

    // Shrink the navbar 
    navbarShrink();

    // Shrink the navbar when page is scrolled
    document.addEventListener('scroll', navbarShrink);

    // Activate Bootstrap scrollspy on the main nav element
    const mainNav = document.body.querySelector('#mainNav');
    if (mainNav) {
        new bootstrap.ScrollSpy(document.body, {
            target: '#mainNav',
            offset: 74,
        });
    };

    // Collapse responsive navbar when toggler is visible
    const navbarToggler = document.body.querySelector('.navbar-toggler');
    const responsiveNavItems = [].slice.call(
        document.querySelectorAll('#navbarResponsive .nav-link')
    );
    responsiveNavItems.map(function (responsiveNavItem) {
        responsiveNavItem.addEventListener('click', () => {
            if (window.getComputedStyle(navbarToggler).display !== 'none') {
                navbarToggler.click();
            }
        });
    });

    // Activate SimpleLightbox plugin for portfolio items
    new SimpleLightbox({
        elements: '#portfolio a.portfolio-box'
    });

});
