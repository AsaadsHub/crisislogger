<h3>Please answer the following questions about your health or exposure to Coronavirus/COVID-19:</h3>

@component('components.form-group')
    <p>During the past 2 weeks, have you been exposed to someone likely to have Coronavirus (COVID-19)? (check all that apply)</p>
    @include('components.checkbox', ['name' => 'exposed[]', 'value' => 'Yes, with positive test'])
    @include('components.checkbox', ['name' => 'exposed[]', 'value' => 'Yes, with medical diagnosis'])
    @include('components.checkbox', ['name' => 'exposed[]', 'value' => 'Yes, but not diagnosed'])
    @include('components.checkbox', ['name' => 'exposed[]', 'value' => 'No'])
@endcomponent

@component('components.form-group')
    <p>During the past 2 weeks, have you been suspected of having COVID-19?</p>
    @include('components.radio', ['name' => 'suspected_having', 'value' => 'Yes, with positive test'])
    @include('components.radio', ['name' => 'suspected_having', 'value' => 'Yes, with medical diagnosis'])
    @include('components.radio', ['name' => 'suspected_having', 'value' => 'Yes, but not diagnosed'])
    @include('components.radio', ['name' => 'suspected_having', 'value' => 'No'])
@endcomponent

@component('components.form-group')
    <p>During the past 2 weeks, have you had any of the following symptoms? (check all that apply)</p>
    @include('components.checkbox', ['name' => 'symptoms[]', 'value' => 'Fever'])
    @include('components.checkbox', ['name' => 'symptoms[]', 'value' => 'Cough'])
    @include('components.checkbox', ['name' => 'symptoms[]', 'value' => 'Shortness Breath'])
    @include('components.checkbox', ['name' => 'symptoms[]', 'value' => 'Sore Throat'])
    @include('components.checkbox', ['name' => 'symptoms[]', 'value' => 'Fatigue'])
    @include('components.input', ['name' => 'symptoms[]', 'placeholder'=>'Other symptoms'])
@endcomponent

@component('components.form-group')
    <p>During the past 2 weeks, has anyone in your family been diagnosed with COVID-19? (check all that apply)</p>
    @include('components.checkbox', ['name' => 'family[]', 'value' => 'Yes, member of household'])
    @include('components.checkbox', ['name' => 'family[]', 'value' => 'Yes, non-household member'])
    @include('components.checkbox', ['name' => 'family[]', 'value' => 'No'])
@endcomponent

@component('components.form-group')
    <p>During the past 2 weeks, have any of the following happened to your family members because of COVID-19?</p>
    @include('components.checkbox', ['name' => 'family_members[]', 'value' => 'Fallen ill physically'])
    @include('components.checkbox', ['name' => 'family_members[]', 'value' => 'Hospitalized'])
    @include('components.checkbox', ['name' => 'family_members[]', 'value' => 'Isolated or put into quarantine'])
    @include('components.checkbox', ['name' => 'family_members[]', 'value' => 'Lost job'])
@endcomponent

@component('components.form-group')
    <p>During the past 2 weeks, how worried have <em>you</em> been about being infected?</p>
    @include('components.radio', ['name' => 'worried_about_being_infected', 'value' => 'Not at all'])
    @include('components.radio', ['name' => 'worried_about_being_infected', 'value' => 'Slightly'])
    @include('components.radio', ['name' => 'worried_about_being_infected', 'value' => 'Moderately'])
    @include('components.radio', ['name' => 'worried_about_being_infected', 'value' => 'Very'])
    @include('components.radio', ['name' => 'worried_about_being_infected', 'value' => 'Extremely'])
@endcomponent

@component('components.form-group')
    <p>During the past 2 weeks, how worried have <em>your friends or family</em> been about being infected?</p>
    @include('components.radio', ['name' => 'worried_about_family_being_infected', 'value' => 'Not at all'])
    @include('components.radio', ['name' => 'worried_about_family_being_infected', 'value' => 'Slightly'])
    @include('components.radio', ['name' => 'worried_about_family_being_infected', 'value' => 'Moderately'])
    @include('components.radio', ['name' => 'worried_about_family_being_infected', 'value' => 'Very'])
    @include('components.radio', ['name' => 'worried_about_family_being_infected', 'value' => 'Extremely'])
@endcomponent

@component('components.form-group')
    <p>During the past 2 weeks, how worried have your <em>physical health</em> been about being infected?</p>
    @include('components.radio', ['name' => 'worried_about_physical_health_being_affected', 'value' => 'Not at all'])
    @include('components.radio', ['name' => 'worried_about_physical_health_being_affected', 'value' => 'Slightly'])
    @include('components.radio', ['name' => 'worried_about_physical_health_being_affected', 'value' => 'Moderately'])
    @include('components.radio', ['name' => 'worried_about_physical_health_being_affected', 'value' => 'Very'])
    @include('components.radio', ['name' => 'worried_about_physical_health_being_affected', 'value' => 'Extremely'])
@endcomponent

@component('components.form-group')
    <p>During the past 2 weeks, how worried have your <em>mental/emotional health</em> been about being infected?</p>
    @include('components.radio', ['name' => 'worried_about_mental_health_being_affected', 'value' => 'Not at all'])
    @include('components.radio', ['name' => 'worried_about_mental_health_being_affected', 'value' => 'Slightly'])
    @include('components.radio', ['name' => 'worried_about_mental_health_being_affected', 'value' => 'Moderately'])
    @include('components.radio', ['name' => 'worried_about_mental_health_being_affected', 'value' => 'Very'])
    @include('components.radio', ['name' => 'worried_about_mental_health_being_affected', 'value' => 'Extremely'])
@endcomponent

@component('components.form-group')
    <p>During the past 2 weeks, how much are you reading, or talking about COVID-19?</p>
    @include('components.radio', ['name' => 'talking_about_covid', 'value' => 'Never'])
    @include('components.radio', ['name' => 'talking_about_covid', 'value' => 'Rarely'])
    @include('components.radio', ['name' => 'talking_about_covid', 'value' => 'Occasionally'])
    @include('components.radio', ['name' => 'talking_about_covid', 'value' => 'Often'])
    @include('components.radio', ['name' => 'talking_about_covid', 'value' => 'Most of the time'])
@endcomponent

@component('components.form-group')
    <p>During the past 2 weeks, has the COVID-19 crisis in your area led to any positive changes in your life?</p>
    @include('components.radio', ['name' => 'positive_changes', 'value' => 'None'])
    @include('components.radio', ['name' => 'positive_changes', 'value' => 'Only a few'])
    @include('components.radio', ['name' => 'positive_changes', 'value' => 'Some'])
@endcomponent

@component('components.form-group')
    <p>If answered <strong>Only a few</strong> or <strong>Some</strong> to the last question, please specify</p>
    @include('components.input', ['name' => 'positive_changes_info'])
@endcomponent
