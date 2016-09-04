@extends('onecol_100')
@section('title', 'Frequently Asked Questions')
@section('description','Answers to common questions about Next Degree - what we do and who we are!')

@section('container')
<div class="uk-vertical-align uk-text-center uk-margin-bottom" style="height:450px;background: url('{{asset('assets/images/splash2.jpg')}}');background-size:cover;">
                        <div class="uk-vertical-align-middle uk-width-1-2 uk-contrast ">
                            <h1 class="uk-heading-large nd-splash-text-highlight">FAQ</h1><br>
                           <p class="uk-text-large nd-splash-text-highlight">Learn more about Next Degree</p>
                        </div>
                    </div>

	<div class="uk-container uk-container-center uk-grid">

	<div class="uk-width-large-8-10">
	<h4>What is Next Degree?</h4>
	<p>Next Degree is an online service that connects students with employers in their university town. Students have valuable skillsets which employers need, be they local individuals looking for freelancers or businesses looking for future graduate staff. Our aim is to bring these two groups together through our platform. </p>
	<h4>How does it work?</h4>
<p>Students sign up using their university email to create an individual account. They can then create a personal profile which specifies what type of work they are looking for, what skills they have or want to acquire, and gives a snapshot of their personality. Employers can then search our database to match them with the perfect candidate, based on factors such as skillset, employment type, location and more. The employer and student can then communicate over our messaging system. 
</p>
<h4>What features will there be during the beta?
</h4>
<p>During the beta students can create a basic profile, as can employers. We will be manually facilitating the connection between the parties until launch. Businesses may contact us in order to find them candidates, and students will receive updates from us including potential work, as well as articles and careers advice from graduates in your area and industry.  
</p>
<h4>What will it cost me?</h4>
<p>Nothing!</p>
<h3>Students</h3>
<h4>What do I have to do?</h4>
<p>Creating your profile couldn’t be simpler: all you have to do is specify what sort of work you’re looking for, upload a picture, provide a small statement about yourself, and then if you wish - upload your CV or connect your linkedin account. </p>
<h4>How can I reach more employers?</h4>
<p>Make your profile appealing to employers and they’ll come to you. We’ll be implementing features in the future that will help students actively pursue employers if they so wish. </p>
<h3>Employers</h3>
<h4>How can I use Next Degree?</h4>
<p>Next Degree makes recruitment much simpler for employers. All the information you need is already there, all you have to do is to create an account. Our search and database functions will help you find a shortlist of ideal candidates. </p>
<h4>Can you help us?</h4>
<p>If you are having trouble finding the right candidate, or want more personalised help, please contact us at support@nextdegree.co.uk and we’ll see what we can do. </p>
<h4>I’m currently not recruiting, why should I use the site?</h4>
<p>The great thing about Next Degree is that there are students looking for all kinds of work. For example, you may not be looking for a full-time employee, but need extra hands for a month to get a project underway. You may also have opportunities for students to undertake work experience with you to learn more about your business and industry. </p>
<h4>I’m a local individual looking for help on a project, can I use your site?</h4>
<p>Yes! Next Degree is all about facilitating different kinds of employment. Looking for a programmer to help build an app? There are computer science undergraduates who are more than capable. A tutor for your children? There are student studying languages, music and maths who can help. Need a babysitter? Why not have a doctor or nurse in training? Need help on a home renovation project? Well a future architect or engineer may be the best option. </p>
	<h3 class="uk-margin-bottom">If you'd like to ask us anything else please get in touch!</h3>
	
	</div>
	@include('components.contact_form')
	</div>


@endsection