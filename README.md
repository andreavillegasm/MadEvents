# project-repo-mad_events
project-repo-mad_events created by GitHub Classroom 

Our team will create an event planning web application that will help its users plan events by providing them with a venue and vendor options that meet the requirements of the event they wish to plan. In this web application, a user can create his/her profile to create events by at his/her own. Moreover, they can invite friends, share their picture or videos, and browse more events based on their interests. We also offer our users a chatbox where they can instantly talk with us, and the ability to reserve their table for the event in advance. Finally, we also remind our users about the upcomig events that they have planned or have been invited to.

livelink: https://jsandzz.tech/mad_event/

Please find the database sql file and the ERD screenshot on the Database folder 

## Gallery Feature - Jashanpreet Kaur
1. Public gallery:
From(public_gallery.php) here everyone can see the complete pictures. Which is posted by the event attendees. So that new user will have a clear idea that how our event actually happend and how our guest enjoyed it. Also a public gallery will give opportunity to every user to share their happiness with everyone.
2. Admin gallery:
This(admin_gallery.php) is from user prespective so that a user can change(edit_pic.php) or delete their pictures. Moreover they can add(add_pic.php) as many picture as they want with description. Also they can add tags to their picture.

## Create Event Feature - Andrea Villegas Mayorga
1. Create Event Form:
This page(new_event.php) will allow users to create an event by inputting the event info and selecting a venue from the dropdown list provided by our compayny mad events.
2. Event Dashboard:
This page (eventinfo_dashboard) will display the user's events both active and past events. Active events are events that are in the process of planning, while past events are events that have already taken place. 
3. Active Event Info:
When clicking on a specific active event, the user will be redirect to the event info page(eventinfo_active.php) which will give the users the ability to see the event details and invite friends to it. In this page the user will also be able to edit the event details (eventinfo_update.php), delete the event all together(eventinfo_delete.php, or close it which will archieve the event and make it part of the past events. 
4. Past Event Info:
When closing an event, said event becomes public and thus can be seen by everyone. Events that are closed can be liked and commented by anyone. When clicking on an specifc past event(eventinfo_past), a user will be able to see the event details, and any likes and comments that the event has. The owner of the event will also be able to upload pictures to said event to further show its success.
## Log In System - Jason
1. Signing up
When users head to signup.php, they are allowed to register their account to sign in. To sign in they have to fill in the form with their username, email, password and confirm password.
2. Signing in
The registered users are able to sign in by entering their credentials that they used in signup.php in login.php.
3. Loging out
The user can log out by going to the home page (index.php) and clicking sign out.

## Feedback - Tianyi

#### admin:

1. View feedback: This page (feedback) will display all feedback users send. Admins can click to head to detail page.

2. Change status of feedback: This page (feedback_detail) will display detail of this page. Admins can read messages and change status of the feedback. Once the feedback is viewed, admins can delete it.

#### user:

1. Add feedback: Users can add their feedback at the feedback.php page.
2. View feedback: Users can view their own feedback at the feedback.php page.

## Comment System - Jason
1. User have to login before being able to sign in.
2. Head over a past event (eventinfo_past.php)
3. Comment and Submit.

## Registration Email - Jashanpreet Kaur
#create mail reminder folder for send the emails (php mailer with composer)
#create a function for sending the emails
When a new user sign up with our website. They will receive a welcome email form our website to make them familiar. Because, In this email we will explain that we are going to offer them with our website. 

## Email Reminder - Jashanpreet Kaur
It’s for those users or guests who are going to attend a event. This feature will send them a reminder before one hour of event’s starting time. This will be done with cron job which will run the reminder email script in every five minutes.

## Invite Friends - Andrea Villegas Mayorga

1. See friends list:

Users can see their friends list by going to the eventinfo_active page of the event they wish to invite their friends to. Once on that page they click on the button inivite, and are redirected to their friends list.

2. Invite Friend:

Users can select on the button invite next to any of the friends on the list, and the friend will be added to the guest list as well as receive an email invitation for the event.

3. Add a friend:

Users can add a friend to their friends list if they wish to add someone new to invite and keep on record for future events.

4. Edit and Delete Friend:

Users can edit the information regarding a particular friend, as well as delete a friend from the friends list.

## Join an event - Tianyi

https://jsandzz.tech/mad_event/reservation.php

1. See available events:

   Events that are available would be events holding after current time. Users are able to check all the available events on our website, and choose any to see details. Events that are already joined by users would still be listed with the join button unclickable.

2. See events booked by current user:

   Events that are already joined by current user would be listed below available events. Users can see what events they have joined, and choose to update or just cancel it.

3. Update a booking:

   Users can update a booking. They will go to booking detail page and select the columns they need to change.

4. Cancel a booking:

   Users can cancel their own bookings. If you do not feel like joining this event anymore, just cancel it!
