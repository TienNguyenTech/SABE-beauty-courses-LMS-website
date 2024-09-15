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
const rawData = `<?= $quizJSON ?>`;
const surveyJson = JSON.parse(rawData);
const survey = new Survey.Model(surveyJson);

document.addEventListener('DOMContentLoaded', () => {
    survey.render(document.getElementById('surveyContainer'));
});

survey.onComplete.add((sender, options) => {
    options.showSaveInProgress();

    const token = '<?= $csrfToken ?>';
    const quizID = '<?= $quizID ?>'

    const xhr = new XMLHttpRequest();
    xhr.open('post', '<?= $this->Url->build(["controller" => "Quizzes", "action" => "submit"], ["fullBase" => true]) ?>');
    xhr.setRequestHeader('Content-Type', 'application/json; charset=utf-8');
    xhr.setRequestHeader('X-CSRF-Token', token);

    xhr.onload = xhr.onerror = () => {
        if(xhr.status = 200) {
            options.showSaveSuccess();
        } else {
            options.showSaveError();
        }
    }


    xhr.onreadystatechange = () => {

        // Redirect
        if(xhr.readyState === XMLHttpRequest.DONE) {
            console.log(xhr.responseText)
            if(xhr.status === 200) {
                window.location.href = xhr.responseText;
            }
        }
    }

    dataArray = Object.entries(sender.data).map(([key, value]) => ({[key]: value}));

    let data = [
        dataArray,
        quizID
    ];

    xhr.send(JSON.stringify(data));
})
</script>
</body>
