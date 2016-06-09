jQuery(document).ready(function(){
  // Initialize collapse button
  jQuery('.button-collapse').sideNav({
        edge: 'right', // Choose the horizontal origin
        closeOnClick: true // Closes side-nav on <a> clicks, useful for Angular/Meteor
      }
    );
 });
