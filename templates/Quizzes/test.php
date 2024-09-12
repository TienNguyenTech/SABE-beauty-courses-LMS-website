<head>
    <!-- ... -->
    <link href="https://unpkg.com/survey-core/defaultV2.min.css" type="text/css" rel="stylesheet">
    <script type="text/javascript" src="https://unpkg.com/survey-core/survey.core.min.js"></script>
    <script type="text/javascript" src="https://unpkg.com/survey-js-ui/survey-js-ui.min.js"></script>
    <!-- ... -->
</head>
<body>
<div id="surveyContainer"></div>

<script>
const surveyJson = JSON.parse(`<?= $quizJSON ?>`);
const survey = new Survey.Model(surveyJson);

document.addEventListener('DOMContentLoaded', () => {
    survey.render(document.getElementById('surveyContainer'));
});

function surveyComplete(survey) {
    saveSurveyResults('', survey.data);
}

function saveSurveyResults(url, json) {
    console.log(json);
}

survey.onComplete.add(surveyComplete);
</script>
</body>
