@component('components.portlet-sticky', ['title' => 'Life Changes in the Past 2 Weeks', 'z_index' => 3])
    <h3>Please answer the following questions about any changes in your life in the last 2 weeks due to Coronavirus/COVID-19:</h3>

    @component('components.form-group')
        <p>During the past 2 weeks, if you attend school, has your school building been closed down?</p>
        @include('components.radio-group', ['name' => 'school_closed'])
    @endcomponent

    @component('components.form-group')
        <p>If yes,</p>
        @include('components.radio-group', ['name' => 'classes_resumed_online', 'value' => 'Have classes resumed online?'])
        @include('components.radio-group', ['name' => 'easy_access_to_computer', 'value' => 'Do you have easy access to the internet and a computer?'])
        @include('components.radio-group', ['name' => 'assignments_to_complete', 'value' => 'Are there assignments to complete?'])
        @include('components.radio-group', ['name' => 'meals_from_the_school', 'value' => 'Are you able to receive meals from the school?'])
    @endcomponent

    @component('components.form-group')
        <p>If no,</p>
        @include('components.radio-group', ['name' => 'classes_in_session', 'value' => 'Are classes in session?'])
        @include('components.radio-group', ['name' => 'classes_in_person', 'value' => 'Are you attending classes in person?'])
    @endcomponent

    @component('components.form-group')
        <p>During the past 2 weeks, if you are working, has your workspace been closed?</p>
        @include('components.radio-group', ['name' => 'workspace_closed'])
    @endcomponent

    @component('components.form-group')
        <p>During the past 2 weeks, have you been able to telework or work from home?</p>
        @include('components.radio-group', ['name' => 'telework'])
    @endcomponent

    @component('components.form-group')
        <p>During the past 2 weeks, how many people outside your household have you had an in-person conversation with?</p>
        @include('components.input', ['name' => 'number_in_person_conversation'])
    @endcomponent

    @component('components.form-group')
        <p>During the past 2 weeks, how much time have you spent going outside of the home (e.g., going to stores, parks, etc.)?</p>
        @include('components.radio', ['name' => 'time_outside_house', 'value' => 'No time'])
        @include('components.radio', ['name' => 'time_outside_house', 'value' => 'Rarely'])
        @include('components.radio', ['name' => 'time_outside_house', 'value' => 'Occasionally'])
        @include('components.radio', ['name' => 'time_outside_house', 'value' => 'Often'])
        @include('components.radio', ['name' => 'time_outside_house', 'value' => 'A lot of the time'])
    @endcomponent

    @component('components.form-group')
        <p>During the past 2 weeks, how stressful have the restrictions on leaving home been for you?</p>
        @include('components.radio', ['name' => 'stressful_restrictions', 'value' => 'Not at all'])
        @include('components.radio', ['name' => 'stressful_restrictions', 'value' => 'Slightly'])
        @include('components.radio', ['name' => 'stressful_restrictions', 'value' => 'Moderately'])
        @include('components.radio', ['name' => 'stressful_restrictions', 'value' => 'Very'])
        @include('components.radio', ['name' => 'stressful_restrictions', 'value' => 'Extremely'])
    @endcomponent

    @component('components.form-group')
        <p>During the past 2 weeks, have your contacts with people outside of your home changed relative to <em>before</em> the Coronavirus/COVID-19 crisis in your area?</p>
        @include('components.radio', ['name' => 'contacts_relative', 'value' => 'A lot less'])
        @include('components.radio', ['name' => 'contacts_relative', 'value' => 'A little less'])
        @include('components.radio', ['name' => 'contacts_relative', 'value' => 'About the same'])
        @include('components.radio', ['name' => 'contacts_relative', 'value' => 'A little more'])
        @include('components.radio', ['name' => 'contacts_relative', 'value' => 'A lot more'])
    @endcomponent

    @component('components.form-group')
        <p>During the past 2 weeks, how much difficulty have you had following the recommendations for keeping away from close contact with people?</p>
        @include('components.radio', ['name' => 'difficulty_keeping_away', 'value' => 'None'])
        @include('components.radio', ['name' => 'difficulty_keeping_away', 'value' => 'A little'])
        @include('components.radio', ['name' => 'difficulty_keeping_away', 'value' => 'Moderate'])
        @include('components.radio', ['name' => 'difficulty_keeping_away', 'value' => 'A lot'])
        @include('components.radio', ['name' => 'difficulty_keeping_away', 'value' => 'A great amount'])
    @endcomponent

    @component('components.form-group')
        <p>During the past 2 weeks, has the quality of the relationships between you and members of your family changed?</p>
        @include('components.radio', ['name' => 'relationship_family', 'value' => 'A lot worse'])
        @include('components.radio', ['name' => 'relationship_family', 'value' => 'A little worse'])
        @include('components.radio', ['name' => 'relationship_family', 'value' => 'About the same'])
        @include('components.radio', ['name' => 'relationship_family', 'value' => 'A little better'])
        @include('components.radio', ['name' => 'relationship_family', 'value' => 'A lot better'])
    @endcomponent

    @component('components.form-group')
        <p>During the past 2 weeks, how stressful have these changes in family contacts been for you?</p>
        @include('components.radio', ['name' => 'stressful_family', 'value' => 'Not at all'])
        @include('components.radio', ['name' => 'stressful_family', 'value' => 'Slightly'])
        @include('components.radio', ['name' => 'stressful_family', 'value' => 'Moderately'])
        @include('components.radio', ['name' => 'stressful_family', 'value' => 'Very'])
        @include('components.radio', ['name' => 'stressful_family', 'value' => 'Extremely'])
    @endcomponent

    @component('components.form-group')
        <p>During the past 2 weeks, has the quality of your relationships with your friends changed?</p>
        @include('components.radio', ['name' => 'relationship_friends_quality', 'value' => 'A lot worse'])
        @include('components.radio', ['name' => 'relationship_friends_quality', 'value' => 'A little worse'])
        @include('components.radio', ['name' => 'relationship_friends_quality', 'value' => 'About the same'])
        @include('components.radio', ['name' => 'relationship_friends_quality', 'value' => 'A little better'])
        @include('components.radio', ['name' => 'relationship_friends_quality', 'value' => 'A lot better'])
    @endcomponent

    @component('components.form-group')
        <p>During the past 2 weeks, how stressful have these changes in social contacts been for you?</p>
        @include('components.radio', ['name' => 'stressful_social', 'value' => 'Not at all'])
        @include('components.radio', ['name' => 'stressful_social', 'value' => 'Slightly'])
        @include('components.radio', ['name' => 'stressful_social', 'value' => 'Moderately'])
        @include('components.radio', ['name' => 'stressful_social', 'value' => 'Very'])
        @include('components.radio', ['name' => 'stressful_social', 'value' => 'Extremely'])
    @endcomponent

    @component('components.form-group')
        <p>During the past 2 weeks, how much has cancellation of important events (such as graduation, prom, vacation, etc.) in your life been difficult for you?</p>
        @include('components.radio', ['name' => 'cancellation_events_impact', 'value' => 'Not at all'])
        @include('components.radio', ['name' => 'cancellation_events_impact', 'value' => 'Slightly'])
        @include('components.radio', ['name' => 'cancellation_events_impact', 'value' => 'Moderately'])
        @include('components.radio', ['name' => 'cancellation_events_impact', 'value' => 'Very'])
        @include('components.radio', ['name' => 'cancellation_events_impact', 'value' => 'Extremely'])
    @endcomponent

    @component('components.form-group')
        <p>During the past 2 weeks, to what degree have changes related to the Coronavirus/COVID-19 crisis in your area created financial problems for you or your family?</p>
        @include('components.radio', ['name' => 'financial_problems_degree', 'value' => 'Not at all'])
        @include('components.radio', ['name' => 'financial_problems_degree', 'value' => 'Slightly'])
        @include('components.radio', ['name' => 'financial_problems_degree', 'value' => 'Moderately'])
        @include('components.radio', ['name' => 'financial_problems_degree', 'value' => 'Very'])
        @include('components.radio', ['name' => 'financial_problems_degree', 'value' => 'Extremely'])
    @endcomponent

    @component('components.form-group')
        <p>During the past 2 weeks, to what degree are you concerned about the stability of your living situation?</p>
        @include('components.radio', ['name' => 'stability_living_situation', 'value' => 'Not at all'])
        @include('components.radio', ['name' => 'stability_living_situation', 'value' => 'Slightly'])
        @include('components.radio', ['name' => 'stability_living_situation', 'value' => 'Moderately'])
        @include('components.radio', ['name' => 'stability_living_situation', 'value' => 'Very'])
        @include('components.radio', ['name' => 'stability_living_situation', 'value' => 'Extremely'])
    @endcomponent

    @component('components.form-group')
        <p>During the past 2 weeks, did you worry whether your food would run out because of a lack of money?</p>
        @include('components.radio-group', ['name' => 'food_run_out'])
    @endcomponent

    @component('components.form-group')
        <p>During the past 2 weeks, how hopeful are you that the Coronavirus/COVID-19 crisis in your area will end soon?</p>
        @include('components.radio', ['name' => 'crisis_will_end_hopeful', 'value' => 'Not at all'])
        @include('components.radio', ['name' => 'crisis_will_end_hopeful', 'value' => 'Slightly'])
        @include('components.radio', ['name' => 'crisis_will_end_hopeful', 'value' => 'Moderately'])
        @include('components.radio', ['name' => 'crisis_will_end_hopeful', 'value' => 'Very'])
        @include('components.radio', ['name' => 'crisis_will_end_hopeful', 'value' => 'Extremely'])
    @endcomponent

@endcomponent

@component('components.portlet-sticky', ['title' => 'Daily Behaviors in the Past 2 Weeks', 'z_index' => 3])
    <h3>Please answer the following questions about your daily behaviors in the last 2 weeks:</h3>

    @component('components.form-group')
        <p>During the past 2 weeks, how many hours per night did you sleep on average?</p>
        @include('components.radio', ['name' => 'hours_slept', 'value' => '< 6 hours'])
        @include('components.radio', ['name' => 'hours_slept', 'value' => '6-8 hours'])
        @include('components.radio', ['name' => 'hours_slept', 'value' => '8-10 hours'])
        @include('components.radio', ['name' => 'hours_slept', 'value' => '> 10 hours'])
    @endcomponent

    @component('components.form-group')
        <p>During the past 2 weeks, how many days per week did you exercise (e.g., increased heart rate, breathing) for at least 30 minutes?</p>
        @include('components.radio', ['name' => 'days_excercised', 'value' => 'None'])
        @include('components.radio', ['name' => 'days_excercised', 'value' => '1-2 days'])
        @include('components.radio', ['name' => 'days_excercised', 'value' => '3-4 days'])
        @include('components.radio', ['name' => 'days_excercised', 'value' => '5-6 days'])
        @include('components.radio', ['name' => 'days_excercised', 'value' => 'Daily'])
    @endcomponent

    @component('components.form-group')
        <p>During the past 2 weeks, how many days per week did you spend time outdoors?</p>
        @include('components.radio', ['name' => 'days_outdoors', 'value' => 'None'])
        @include('components.radio', ['name' => 'days_outdoors', 'value' => '1-2 days'])
        @include('components.radio', ['name' => 'days_outdoors', 'value' => '3-4 days'])
        @include('components.radio', ['name' => 'days_outdoors', 'value' => '5-6 days'])
        @include('components.radio', ['name' => 'days_outdoors', 'value' => 'Daily'])
    @endcomponent

@endcomponent

@component('components.portlet-sticky', ['title' => 'Emotions/Worries in the Past 2 Weeks', 'z_index' => 3])
    <h3>Please answer the following questions about your daily behaviors in the last 2 weeks:</h3>

    @component('components.form-group')
        <p>During the past 2 weeks, how worried were you generally?</p>
        @include('components.radio', ['name' => 'worried', 'value' => 'Not worried at all'])
        @include('components.radio', ['name' => 'worried', 'value' => 'Slightly worried'])
        @include('components.radio', ['name' => 'worried', 'value' => 'Moderately worried'])
        @include('components.radio', ['name' => 'worried', 'value' => 'Very worried'])
        @include('components.radio', ['name' => 'worried', 'value' => 'Extremely worried'])
    @endcomponent

    @component('components.form-group')
        <p>During the past 2 weeks, how happy versus sad were you?</p>
        @include('components.radio', ['name' => 'happy_sad', 'value' => 'Very sad/depressed/unhappy'])
        @include('components.radio', ['name' => 'happy_sad', 'value' => 'Moderately sad/depressed/unhappy'])
        @include('components.radio', ['name' => 'happy_sad', 'value' => 'Neutral'])
        @include('components.radio', ['name' => 'happy_sad', 'value' => 'Moderately happy/cheerful'])
        @include('components.radio', ['name' => 'happy_sad', 'value' => 'Very happy/cheerful'])
    @endcomponent

    @component('components.form-group')
        <p>During the past 2 weeks, how relaxed versus anxious were you?</p>
        @include('components.radio', ['name' => 'anxious_calm', 'value' => 'Very relaxed/calm'])
        @include('components.radio', ['name' => 'anxious_calm', 'value' => 'Moderately relaxed/calm'])
        @include('components.radio', ['name' => 'anxious_calm', 'value' => 'Neutral'])
        @include('components.radio', ['name' => 'anxious_calm', 'value' => 'Moderately nervous/anxious'])
        @include('components.radio', ['name' => 'anxious_calm', 'value' => 'Very nervous/anxious'])
    @endcomponent

    @component('components.form-group')
        <p>During the past 2 weeks, how fidgety or restless were you?</p>
        @include('components.radio', ['name' => 'restless', 'value' => 'Not fidgety/restless at all'])
        @include('components.radio', ['name' => 'restless', 'value' => 'Slightly fidgety/restless'])
        @include('components.radio', ['name' => 'restless', 'value' => 'Moderately fidgety/restless'])
        @include('components.radio', ['name' => 'restless', 'value' => 'Very fidgety/restless'])
        @include('components.radio', ['name' => 'restless', 'value' => 'Extremely fidgety/restless'])
    @endcomponent

    @component('components.form-group')
        <p>During the past 2 weeks, how fatigued or tired were you?</p>
        @include('components.radio', ['name' => 'fatigue', 'value' => 'Not fatigued or tired at all'])
        @include('components.radio', ['name' => 'fatigue', 'value' => 'Slightly fatigued or tired'])
        @include('components.radio', ['name' => 'fatigue', 'value' => 'Moderately fatigued or tired'])
        @include('components.radio', ['name' => 'fatigue', 'value' => 'Very fatigued or tired'])
        @include('components.radio', ['name' => 'fatigue', 'value' => 'Extremely fatigued or tired'])
    @endcomponent

    @component('components.form-group')
        <p>During the past 2 weeks, how well were you able to concentrate or focus?</p>
        @include('components.radio', ['name' => 'focused_distracted', 'value' => 'Very focused/attentive'])
        @include('components.radio', ['name' => 'focused_distracted', 'value' => 'Moderately focused/attentive'])
        @include('components.radio', ['name' => 'focused_distracted', 'value' => 'Neutral'])
        @include('components.radio', ['name' => 'focused_distracted', 'value' => 'Moderately unfocused/distracted'])
        @include('components.radio', ['name' => 'focused_distracted', 'value' => 'Very unfocused/distracted'])
    @endcomponent

    @component('components.form-group')
        <p>During the past 2 weeks, how irritable or easily angered have you been?</p>
        @include('components.radio', ['name' => 'irritable', 'value' => 'Not irritable or easily angered at all'])
        @include('components.radio', ['name' => 'irritable', 'value' => 'Slightly irritable or easily angered'])
        @include('components.radio', ['name' => 'irritable', 'value' => 'Moderately irritable or easily angered'])
        @include('components.radio', ['name' => 'irritable', 'value' => 'Very irritable or easily angered'])
        @include('components.radio', ['name' => 'irritable', 'value' => 'Extremely irritable or easily angered'])
    @endcomponent

    @component('components.form-group')
        <p>During the past 2 weeks, how lonely were you?</p>
        @include('components.radio', ['name' => 'lonely', 'value' => 'Not lonely at all'])
        @include('components.radio', ['name' => 'lonely', 'value' => 'Slightly lonely'])
        @include('components.radio', ['name' => 'lonely', 'value' => 'Moderately lonely'])
        @include('components.radio', ['name' => 'lonely', 'value' => 'Very lonely'])
        @include('components.radio', ['name' => 'lonely', 'value' => 'Extremely lonely'])
    @endcomponent

@endcomponent

@component('components.portlet-sticky', ['title' => 'Media Use in the Past 2 Weeks', 'z_index' => 3])
    <h3>Please answer the following questions about your media use in the last 2 weeks:</h3>

    @component('components.form-group')
        <p>During the past 2 weeks, how much time per day did you spend watching TV or digital media (e.g., Netflix, YouTube, web surfing)? </p>
        @include('components.radio', ['name' => 'tv_digital_media', 'value' => 'No TV or digital media'])
        @include('components.radio', ['name' => 'tv_digital_media', 'value' => 'Under 1 hour'])
        @include('components.radio', ['name' => 'tv_digital_media', 'value' => '1-3 hours'])
        @include('components.radio', ['name' => 'tv_digital_media', 'value' => '4-6 hours'])
        @include('components.radio', ['name' => 'tv_digital_media', 'value' => 'More than 6 hours'])
    @endcomponent

    @component('components.form-group')
        <p>During the past 2 weeks, how much time per day did you spend using social media (e.g., Facetime, Facebook, Instagram, Snapchat, Twitter, TikTok)? </p>
        @include('components.radio', ['name' => 'social_media', 'value' => 'No social media'])
        @include('components.radio', ['name' => 'social_media', 'value' => 'Under 1 hour'])
        @include('components.radio', ['name' => 'social_media', 'value' => '1-3 hours'])
        @include('components.radio', ['name' => 'social_media', 'value' => '4-6 hours'])
        @include('components.radio', ['name' => 'social_media', 'value' => 'More than 6 hours'])
    @endcomponent

    @component('components.form-group')
        <p>During the past 2 weeks, how much time per day did you spend playing video games? </p>
        @include('components.radio', ['name' => 'video_games', 'value' => 'No video games'])
        @include('components.radio', ['name' => 'video_games', 'value' => 'Under 1 hour'])
        @include('components.radio', ['name' => 'video_games', 'value' => '1-3 hours'])
        @include('components.radio', ['name' => 'video_games', 'value' => '4-6 hours'])
        @include('components.radio', ['name' => 'video_games', 'value' => 'More than 6 hours'])
    @endcomponent

@component

@component('components.portlet-sticky', ['title' => 'Substance Use in the Past 2 Weeks', 'z_index' => 3])
    <h3>Please answer the following questions about your substance use in the last 2 weeks:</h3>

    @component('components.form-group')
        <p>During the past 2 weeks, how frequently did you use alcohol? </p>
        @include('components.radio', ['name' => 'alcohol', 'value' => 'Not at all'])
        @include('components.radio', ['name' => 'alcohol', 'value' => 'Rarely'])
        @include('components.radio', ['name' => 'alcohol', 'value' => 'Occasionally'])
        @include('components.radio', ['name' => 'alcohol', 'value' => 'Often'])
        @include('components.radio', ['name' => 'alcohol', 'value' => 'Regularly'])
    @endcomponent

    @component('components.form-group')
        <p>During the past 2 weeks, how frequently did you vape? </p>
        @include('components.radio', ['name' => 'vaping', 'value' => 'Not at all'])
        @include('components.radio', ['name' => 'vaping', 'value' => 'Rarely'])
        @include('components.radio', ['name' => 'vaping', 'value' => 'Occasionally'])
        @include('components.radio', ['name' => 'vaping', 'value' => 'Often'])
        @include('components.radio', ['name' => 'vaping', 'value' => 'Regularly'])
    @endcomponent

    @component('components.form-group')
        <p>During the past 2 weeks, how frequently did you use cigarettes or other tobacco? </p>
        @include('components.radio', ['name' => 'tobacco', 'value' => 'Not at all'])
        @include('components.radio', ['name' => 'tobacco', 'value' => 'Rarely'])
        @include('components.radio', ['name' => 'tobacco', 'value' => 'Occasionally'])
        @include('components.radio', ['name' => 'tobacco', 'value' => 'Often'])
        @include('components.radio', ['name' => 'tobacco', 'value' => 'Regularly'])
    @endcomponent

    @component('components.form-group')
        <p>During the past 2 weeks, how frequently did you use marijuana/cannabis? </p>
        @include('components.radio', ['name' => 'cannabis', 'value' => 'Not at all'])
        @include('components.radio', ['name' => 'cannabis', 'value' => 'Rarely'])
        @include('components.radio', ['name' => 'cannabis', 'value' => 'Occasionally'])
        @include('components.radio', ['name' => 'cannabis', 'value' => 'Often'])
        @include('components.radio', ['name' => 'cannabis', 'value' => 'Regularly'])
    @endcomponent

    @component('components.form-group')
        <p>During the past 2 weeks, how frequently did you use opiates, heroin, cocaine, crack, amphetamine, methamphetamine, hallucinogens, or ecstasy? </p>
        @include('components.radio', ['name' => 'other_drugs', 'value' => 'Not at all'])
        @include('components.radio', ['name' => 'other_drugs', 'value' => 'Rarely'])
        @include('components.radio', ['name' => 'other_drugs', 'value' => 'Occasionally'])
        @include('components.radio', ['name' => 'other_drugs', 'value' => 'Often'])
        @include('components.radio', ['name' => 'cother_drugs', 'value' => 'Regularly'])
    @endcomponent

@component

@component('components.portlet-sticky', ['title' => 'Additional Concerns and Comments', 'z_index' => 3])
    <h3>Please answer the following questions about your media use in the last 2 weeks:</h3>

    @component('components.form-group')
        <p>Please describe anything else that concerns you about the impact of Coronavirus/COVID-19 on you, your friends, or your family.</p>
        @include('components.textarea', ['name' => 'other_covid_concerns'])
    @endcomponent

    @component('components.form-group')
        <p>Please provide any comments that you would like about this survey and/or related topics.</p>
        @include('components.textarea', ['name' => 'other_survey_comments'])
    @endcomponent


@component