<?php

include_once '../../config.php';
include_once 'includes/header.php';

use LearnositySdk\Request\Init;
use LearnositySdk\Utils\Uuid;

$security = array(
    'consumer_key' => $consumer_key,
    'domain'       => $domain,
    'timestamp'    => $timestamp
);

$items = array("LEAR_222383");
$sessionid = Uuid::generate();

$request = array(
    'user_id'        => $studentid,
    'rendering_type' => 'inline',
    'name'           => 'Items API demo - Inline Activity.',
    'state'          => 'initial',
    'activity_id'    => 'itemsinlinedemo',
    'session_id'     => $sessionid,
    'course_id'      => $courseid,
    'items'          => $items,
    'type'           => 'submit_practice',
    'config'         => array(
        "renderSaveButton"    => false,
        "renderSubmitButton"  => false,
        "ignore_validation"   => false,
        'questionsApiVersion' => 'v2'
    )
);

$Init = new Init('items', $security, $consumer_secret, $request);
$signedRequest = $Init->generate();

?>

<div class="jumbotron section">
    <div class="toolbar">
        <ul class="list-inline">
            <li data-toggle="tooltip" data-original-title="Preview API Initialisation Object"><a href="#"  data-toggle="modal" data-target="#initialisation-preview"><span class="glyphicon glyphicon-search"></span></a></li>
            <li data-toggle="tooltip" data-original-title="Visit the documentation"><a href="http://docs.learnosity.com/itemsapi/" title="Documentation"><span class="glyphicon glyphicon-book"></span></a></li>
            <li data-toggle="tooltip" data-original-title="Toggle product overview box"><a href="#"><span class="glyphicon glyphicon-chevron-up jumbotron-toggle"></span></a></li>
        </ul>
    </div>
    <div class="overview">
        <h1>Learnosity iOS Browser</h1>
        <p>Example activity with audio question types created to showcase Browser iOS app.</p>
    </div>
</div>

<div class="section">
    <br>
    <p>
        <?php foreach ($items as $item) { ?>
            <span class="learnosity-item" data-reference="<?= $item; ?>"></span>
        <?php } ?>
        <span class="learnosity-submit-button"></span>
    </p>
</div>

<div id='log'></div>

<!-- WebView JS Bridge -->
<script>
    var uniqueId = 1;

    window.log = function (message, data) {
        var log = document.getElementById('log');
        var el = document.createElement('div');
        el.className = 'logLine';
        el.innerHTML = uniqueId++ + '. ' + message + ':<br/>' + JSON.stringify(data);
        if (log.children.length) { log.insertBefore(el, log.children[0]); }
        else { log.appendChild(el); }
    };

    window.onerror = function (errorMsg, url, lineNumber) {
        window.log("window.onerror:" + url + ":" + lineNumber, errorMsg);
    };

    function connectWebViewJavascriptBridge(callback) {
        if (window.WebViewJavascriptBridge) {
            callback(WebViewJavascriptBridge);
        } else {
            document.addEventListener('WebViewJavascriptBridgeReady', function() {
                callback(WebViewJavascriptBridge);
            }, false);
        }
    }

    connectWebViewJavascriptBridge(function(bridge) {
        bridge.init();
        window.WebViewJavascriptBridgeInstance = bridge;
    });
</script>

<!-- Container for the items api to load into -->
<script src="//items.vg.learnosity.com"></script>
<script>
    var eventOptions = {
            readyListener: function () {
                console.log('Learnosity Items API is ready');
            }
        },
        itemsApp = LearnosityItems.init(<?php echo $signedRequest; ?>, eventOptions);
</script>

<?php
    include_once 'views/modals/initialisation-preview.php';
    include_once 'includes/footer.php';
