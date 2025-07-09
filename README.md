# Trail Map Report - Custom WordPress Theme

![WordPress](https://img.shields.io/badge/WordPress-Custom%20Theme-blue)
![SCSS](https://img.shields.io/badge/SCSS-CSS%20Preprocessor-red)
![jQuery](https://img.shields.io/badge/jQuery-Tooltip%20Module-blue)

## Table of Contents
- [Overview](#overview)
- [Files and folders](#files-and-folders)
- [Dependencies](#dependencies)
- [Getting started](#getting-started)

## Overview
This is the code for Trail Map Report--a custom WordPress theme I created as part of a task for a job application at IDL Web Inc.

The task was to set up a clean WordPress installation, create a form with a dropdown for five trails from a trail map, each containing "Open" and "Closed" and a page with the trail map containing an image map zone. When you hover over one of the five trails on the map (or tap on mobile), a popup appears that displays the name of the trail as well as either "Open" or "Closed" based on the most recent form submission. Although the task didn't require a custom theme, I felt like it would help showcase my WordPress technical skills if I built one. The site, live at [trailmapreport.simeondavenport.com](https://trailmapreport.simeondavenport.com/), is deployed using AWS EC2 with a MariaDB database and an Apache server.

## Files and folders
My WordPress theme contains 9 files at the root of the theme as well as four subfolders (or five if you're working locally).
### Root files
- **.gitignore**: Contains just one line--"node_modules/". I do not want the `node_modules` folder pushed up to GitHub as it is huge and only necessary when working with the theme locally.
- **footer.php**: Contains the HTML and PHP code that appears at the bottom of my site.
- **functions.php**: Contains a few PHP functions that do actions such as adding the CSS and JavaScript to the website, adding a title tag to the pages and saving the submitted form data into the WordPress database.
- **header.php**: Contains the HTML and PHP code that appears at the top of my site.
- **index.php**: Contains the HTML and PHP code that appears between the header and footer in the main part of my site.
- **package-lock.json**: Contains the exact version and dependency tree of all the installed packages.
- **package.json**: Contains metadata about my project and its dependencies. My project's dependencies will be explained in detail later.
- **screenshot.png**: A screenshot containing what the front end of my site looks like, which is previewed when the theme is uploaded to WordPress.
- **style.css**: A file containing information about my theme, such as the author (me), the theme name, a description, etc.
### Subfolders
- **build**: All my compiled JavaScript and SCSS outputs to this folder via the `wp-scripts dev` or `wp-scripts build` command. Some SCSS scripts compile separate from the main `style.scss` file due to only being used on one page, eliminating unnecessary CSS imports on pages where they are not needed.
- **css**: Contains all of my SCSS files. I chose to use SCSS instead of vanilla CSS to keep my CSS stylings DRY. The files for the font Wonderia, which I used on the site, also live here.
- **images**: Contains the trail map image used on the site.
- **node_modules**: This folder only exists in local development. When migrating up to AWS (or anywhere else online), this folder is not necessary. It contains all the external libraries and dependencies my theme relies on to function.
- **src**: Contains my JavaScript to be compiled. My index.js file imports both the main SCSS file and the Tooltip module, which powers the hover functionality of the image map. The Tooltip module uses jQuery as opposed to vanilla JavaScript.

## Dependencies
My WordPress theme contains seven NPM dependencies:
- **@wordpress/scripts**: The official WordPress scripts dependency bundles up my JavaScript and SCSS and outputs it to the build folder, where it is then imported into my site.
- **concurrently**: This dependency runs both the `wp-scripts build` command and the extra SCSS compilation at the same time, which is useful for my dev script.
- **image-map-resizer**: This dependency shrinks down the image map with the image itself, ensuring that even on a small screen, all the trail zones still appear where they should in the image.
- **npm-run-all**: Runs all command starting with either "build:" or "scss:" since I needed multiple separate scripts that output the page-dependent SCSS to the build folder.
- **sass**: Compiles the page-dependent SCSS files to CSS and outputs them to a subfolder in build called "css".
- **slugify**: Used for converting the names of the trails into URL-friendly slugs, used to match the tooltip hover functionality to certain map areas in my image map zone with specific slugified names.
- **wait-on**: Used for waiting until the `wp-scripts build` or  `wp-scripts dev` script finishes before compiling my page-dependent SCSS, ensuring that it is not completely wiped from the build folder.

## Getting started
Here are the steps to using my theme and setting up the site like I have it.
1. Set up a clean WordPress installation, either locally or deployed online.
2. After setting up WordPress and logging into the admin dashboard, install and activate the Contact Form 7 plugin.
3. In the admin dashboard, you should now see a new setting called "Contact". Hover over it and click "Add Contact Form".
4. In the "Form" area, paste in the following:
    ```
    <label> Rock Island Run</label>[select* rock-island-run first_as_label "Select" "Open" "Closed"]
    
    <label> Beginner's Luck</label>[select* beginners-luck first_as_label "Select" "Open" "Closed"]
    
    <label> Lower Omigosh</label>[select* lower-omigosh first_as_label "Select" "Open" "Closed"]
    
    <label> Alley Cat</label>[select* alley-cat first_as_label "Select" "Open" "Closed"]
    
    <label> Wolf Creek Hollow</label>[select* wolf-creek-hollow first_as_label "Select" "Open" "Closed"]
    
    [submit "Submit"]
    ```
5. Give the form a title and click "Save".
6. On the "Pages" section, create two new pages. I've named mine "Snow Report Form" and "Snow Report Page".
7. On one of the two pages you created, add the Contact Form 7 block. Under "SELECT A CONTACT FORM:", choose the form you just created.
8. Under "Settings", go to "Reading". Where it says "Your homepage displays", select "A static page (select below)" and then choose the page you added the Contact Form 7 block to.
9. Click "Save Changes".
10. On this GitHub repository, click the green "Code" button and click "Download ZIP".
11. Once the ZIP file is downloaded, extract it. This should create a brand new folder called "Trail-Map-Report-master".
12. Add the theme folder to your WordPress site and activate it.
    - If you are using WordPress locally on your own machine, move the `Trail-Map-Report-master` folder into your `wp-content/themes` folder. Then in the admin dashboard, hover over "Appearances", select "Themes" and activate the new theme.
    - If you are using an online deployed WordPress instance, go inside the `Trail-Map-Report-master` folder, select all files inside and send them to another ZIP folder. Then, on the "Appearance" tab on the WordPress admin dashboard, select "Themes", then click "Add Theme", then "Upload Theme" and upload this new ZIP file you have created. If it is not automatically activated once it is done uploading, activate it.
13. If you are using an online deployed WordPress instance instead of a local WordPress instance on your own machine, ignore this final step. Otherwise, open up a terminal, have it point to the newly-added theme folder, type in "npm install", press enter and wait for the command to finish (Note: You will need Node.js installed for this to work).

Once you finish all of these steps, you now have the Trail Map Report theme working on your WordPress site! You can now view the front end and test out the report form and the image map on the report page.
