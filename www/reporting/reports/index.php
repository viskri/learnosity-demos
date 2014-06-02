<?php

include_once '../../config.php';
include_once 'includes/header.php';

use LearnositySdk\Request\Init;

$security = array(
    'consumer_key' => $consumer_key,
    'domain'       => $domain
);

$request = array(
    'reports' => array(
        array(
            'id'          => 'report-1',
            'type'        => 'sessions-summary',
            'user_id'     => 'brianmoser',
            'session_ids' => array(
                'AC023456-2C73-44DC-82DA28894FCBC3BF'
            )
        ),
        array(
            'id'         => 'report-2',
            'type'       => 'session-detail',
            'user_id'    => 'brianmoser',
            'session_id' => '8151DD9E-9029-4D13-AC773EC9C05E7FF2'
        ),
        array(
            'id'        => 'report-3',
            'type'      => 'progress-by-tag',
            'user_id'   => 'brianmoser',
            'hierarchy' => 'author'
        ),
        array(
            'id'          => 'report-4',
            'type'        => 'sessions-summary-by-tag',
            'user_id'     => 'brianmoser',
            'ui'          => 'bar-chart',
            'hierarchy'   => 'author',
            'session_ids' => array(
                'B146BA2C-C2D0-4368-B90FFBA2B245F2BA'
            )
        ),
        array(
            'id'           => 'report-5',
            'type'         => 'lastscore-by-activity-by-user',
            'scoring_type' => 'partial',
            'ui'           => 'numeric',
            'users'        => array(
                array(
                    'id' => 'brianmoser',
                    'name' => 'Brian Moser'
                ),
                array(
                    'id' => '12345678',
                    'name' => 'John Carter'
                )
            ),
            'activities' => array(
                array(
                    'id' => 'edde56e8-ff65-e42e-b4fe49caad796bd',
                    'name' => 'Mid Term'
                ),
                array(
                    'id' => 'emberDemo2013',
                    'name' => 'Final'
                )
            )
        ),
        array(
            'id'           => 'report-6',
            'type'         => 'lastscore-by-activity',
            'scoring_type' => 'partial',
            'user_id'      => 'brianmoser',
            'activities'   => array(
                array(
                    'id' => 'edde56e8-ff65-e42e-b4fe49caad796bd',
                    'name' => 'Mid Term'
                ),
                array(
                    'id' => 'emberDemo2013',
                    'name' => 'Final'
                )
            )
        ),
        array(
            'id'           => 'report-7',
            'type'         => 'lastscore-by-item-by-user',
            'scoring_type' => 'partial',
            'users'        => array(
                array(
                    'id' => 'brianmoser',
                    'name' => 'Brian Moser'
                ),
                array(
                    'id' => '12345678',
                    'name' => 'John Carter'
                )
            ),
            'activity_id' => '52f5b81d-9270-914a-7094a1ada4d55e6e'
        ),
        array(
            'id'    => 'report-8',
            'type'  => 'lastscore-by-tag-by-user',
            'users' => array(
                array(
                    'id' => 'brianmoser',
                    'name' => 'Brian Moser'
                ),
                array(
                    'id' => '12345678',
                    'name' => 'John Carter'
                )
            ),
            'activity_id' => '52f5b81d-9270-914a-7094a1ada4d55e6e',
            'hierarchy' => 'questiontype'
        )
    )
);

$Init = new Init('reports', $security, $consumer_secret, $request);
$signedRequest = $Init->generate();

?>
<style type="text/css">
    .lrn-reports-vertical-content {
        margin-left: -1px;
        min-width: 750px;
        width: 880px;
        border-left: 1px solid #ddd;
        padding-left: 30px;
    }
    .lrn-nav-tabs {
        min-width: 250px;
        width: 250px;
        height: 100%;
    }
    .lrn-nav-reports ul.nav-tabs .padding {
        height: 37px;
    }
    .lrn-reports-content {
        min-width: 1100px;
        height: 100%;
    }
    .lrn-reports-summary {
        font-size: 13px;
    }
    html,
    body,
    .lrn-nav-reports ul {
        height: 100%;
    }
    .lrn-reports-demo-wrapper {
        padding: 20px;
    }
</style>
<div class="jumbotron clearfix">
    <h1>Reports API</h1>
    <p>A cross domain embeddable service that allows content providers to easily render rich reports.<p>
    <div class="row">
        <div class="col-md-10">
            <h4><a href="http://docs.learnosity.com/reportsapi/" class="text-muted">
                <span class="glyphicon glyphicon-book"></span> Documentation
            </a></h4>
            <h4><a href="#" class="text-muted" data-toggle="modal" data-target="#initialisation-preview">
                <span class="glyphicon glyphicon-share-alt"></span> Preview API Initialisation Object
            </a></h4>
        </div>
        <div class="col-md-2">
            <p class='text-right'>
                <a class="btn btn-primary btn-lg" href="../sso">
                    Next <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </p>
        </div>
    </div>
</div>
<div class="panel-group" id="lrn-reports-demos-accordion">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#lrn-reports-demos-accordion" href="#lrn-reports-demos-sessions">
                Reports By Session
            </a>
            </h4>
        </div>
        <div id="lrn-reports-demos-sessions" class="panel-collapse collapse in">
            <div class="panel-body">
                <div id="lrn-reports-demos-sessions-content">
                    <div class="lrn-nav-tabs lrn-nav-sessions pull-left">
                        <ul class="nav nav-tabs tabs-left">
                          <li class="active"><a id="lrn-nav-session-summary" href="#sessions-summary" data-toggle="tab">Sessions Summary</a></li>
                          <li><a id="lrn-nav-session-detail" href="#sessions-detail" data-toggle="tab">Session Detail</a></li>
                          <li><a id="lrn-nav-session-tags" href="#sessions-tags" data-toggle="tab">Sessions Summary By Tag Chart</a></li>
                        </ul>
                    </div>
                    <div class="lrn-reports-vertical-content lrn-tab-content tab-content pull-left">
                        <div class="tab-pane active" id="sessions-summary">
                            <section>
                                <h3 class="report-title">Sessions Summary</h3>
                                <p class="lrn-report-summary">Gain quick, meaningful information about a students session at a glance.</p>
                                <span class="learnosity-report" id="report-1"></span>
                            </section>
                        </div>
                        <div class="tab-pane" id="sessions-detail">
                            <section>
                                <h3 class="report-title">Session Detail</h3>
                                <p class="lrn-report-summary">A fine-grain approach to gleaning strengths and weaknesses from a students session.</p>
                                <span class="learnosity-report" id="report-2"></span>
                            </section>
                        </div>
                        <div class="tab-pane" id="sessions-tags">
                            <section>
                                <h3 class="report-title">Sessions Summary By Tag Chart</h3>
                                <p class="lrn-report-summary">A sessions summary broken down into its constituent tags.</p>
                                <span class="learnosity-report" id="report-4"></span>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#lrn-reports-demos-accordion" href="#lrn-reports-demos-lastscore">
                    Reports By Latest Score
                </a>
            </h4>
        </div>
        <div id="lrn-reports-demos-lastscore" class="panel-collapse collapse">
            <div class="panel-body">
                <div id="lrn-reports-demos-lastscore-content">
                    <div class="lrn-nav-tabs lrn-nav-lastscore pull-left">
                        <ul class="nav nav-tabs tabs-left">
                            <li class="active"><a id="lrn-nav-lastscore-activity" href="#lastscore-activity" data-toggle="tab">Latest Score By Activity</a></li>
                            <li><a id="lrn-nav-lastscore-user" href="#lastscore-user" data-toggle="tab">Latest Score By Activity By User</a></li>
                            <li><a id="lrn-nav-lastscore-item" href="#lastscore-item" data-toggle="tab">Latest Score By Item By User</a></li>
                            <li><a id="lrn-nav-lastscore-tag" href="#lastscore-tag" data-toggle="tab">Latest Score By Tag By User</a></li>
                        </ul>
                    </div>
                    <div class="lrn-reports-vertical-content lrn-tab-content tab-content pull-left">
                        <div class="tab-pane active" id="lastscore-activity">
                            <section>
                                <h3 class="report-title">Latest Score by Activity</h3>
                                <p class="lrn-report-summary">
                                    Obtain the latest activity scores for a particular student, represented by either a progress bar (shown), or a numeric result.
                                    <br>Hover over student scores to gather a meaningful score breakdown.
                                </p>
                                <p class="lrn-report-summary">Activities and scores can trigger onClick events to tie into other reports.</p>
                                <span class="learnosity-report" id="report-6"></span>
                            </section>
                            <div id="lrn-report-lastscore-activity-events"></div>
                        </div>
                        <div class="tab-pane" id="lastscore-user">
                            <section>
                                <h3 class="report-title">Latest Score by Activity by User</h3>
                                <p class="lrn-report-summary">
                                    Obtain the latest activity scores for a group of students, represented by either a numeric result (shown), or a progress bar.
                                    <br>Hover over student scores to gather a meaningful score break-down.
                                </p>
                                <p class="lrn-report-summary">Names, activities and scores can trigger onClick events to tie into other reports.</p>
                                <span class="learnosity-report" id="report-5"></span>
                            </section>
                            <div id="lrn-report-lastscore-user-events"></div>
                        </div>
                        <div class="tab-pane" id="lastscore-item">
                            <section>
                                <h3 class="report-title">Latest Score by Item by User</h3>
                                <p class="lrn-report-summary">
                                    Obtain the latest activity score with a break-down of its constituent items.
                                    <br>Hover over items to see the fine grain score break-down.
                                </p>
                                <p class="lrn-report-summary">Names and scores can trigger onClick events to tie into other reports.</p>
                                <span class="learnosity-report" id="report-7"></span>
                            </section>
                            <div id="lrn-report-lastscore-item-events"></div>
                        </div>
                        <div class="tab-pane" id="lastscore-tag">
                            <section>
                                <h3 class="report-title">Latest Score by Tag by User</h3>
                                <p class="lrn-report-summary">
                                    Obtain the latest activity score with a break-down of scores according its constituent tags.
                                    <br>Hover over the tag scores to see the fine grain score break-down.
                                </p>
                                <p class="lrn-report-summary">Names and scores can trigger onClick events to tie into other reports.</p>
                                <span class="learnosity-report" id="report-8"></span>
                            </section>
                            <div id="lrn-report-lastscore-tag-events"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#lrn-reports-demos-accordion" href="#lrn-reports-demos-progress">
                    Reports By Progress
                </a>
            </h4>
        </div>
        <div id="lrn-reports-demos-progress" class="panel-collapse collapse">
            <div class="panel-body">
                <div id="lrn-reports-demos-progress-content">
                    <div class="tab-pane" id="progress">
                        <section>
                            <h3 class="report-title">Progress by Tag Table</h3>
                            <p class="lrn-report-summary">Gather insight into user progress according to your assigned tag hierarchy.</p>
                            <div class="alert alert-info">
                                <strong>Note:</strong> The progress data for this report is updated every 5 minutes
                            </div>
                            <span class="learnosity-report" id="report-3"></span>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Demo Report OnClick Modal -->
<div class="modal fade" id="lrn-reports-demos-modal" tabindex="-1" role="dialog" aria-labelledby="lrn-reports-demos-modal-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="lrn-reports-demos-modal-label">Demo Report</h4>
            </div>
            <div id="lrn-reports-demos-modal-content" class="modal-body"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script src="//reports.learnosity.com"></script>
<script src="<?php echo $env['www'] ?>static/vendor/head.min.js"></script>
<script src="<?php echo $env['www'] ?>static/vendor/reveal/reveal.js"></script>
<script>
    var config = <?php echo $signedRequest; ?>;
    config.configuration = {
        questionsApiVersion: "v2"
    };
    var lrnReports = LearnosityReports.init(config, {
        readyListener: onReportsReady
    });

    function onReportsReady() {
        var commonFunction = function(data, target, modal) {
            if (modal) {
                var usReports = ['sessions-summary', 'session-detail', 'sessions-summary-by-tag'];
                var reportType = usReports[Math.floor(Math.random()*usReports.length)];

                $('#lrn-reports-demos-modal').modal({
                    'remote': 'demo-request.php'
                    + '?session_id=' + data.session_id
                    + '&user_id=' + data.user_id
                    + '&activity_id=' + data.activity_id
                    + '&report=' + reportType
                });

                $('body').on('hidden.bs.modal', '.modal', function () {
                    $(this).removeData('bs.modal');
                });
            } else {
                var html = '<div class="alert alert-info alert-dismissable">';
                    html += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><p>';
                    html += data.user_id ? '<p><strong>User ID:</strong> ' + data.user_id + '</p>' : '';
                    html += data.activity_id ? '<p><strong>Activity ID:</strong> ' + data.activity_id + '</p>' : '';
                    html += data.session_id ? '<p><strong>Session ID:</strong> ' + data.session_id + '</p>' : '';
                    html += '</p></div>';
                    $('#' + target).append(html);
            }
        };

        /* group-lastscore-by-activity onclick events */
        var groupLastScoreByActivity = lrnReports.getReport('report-6');

        groupLastScoreByActivity.on('click:score', function (data) {
            commonFunction(data, 'lrn-report-lastscore-activity-events', true);
        });

        groupLastScoreByActivity.on('click:activity', function (data) {
            commonFunction(data, 'lrn-report-lastscore-activity-events', false);
        });

        groupLastScoreByActivity.on('click:user', function(data) {
            commonFunction(data, 'lrn-report-lastscore-activity-events', false);
        });

        /* user-lastscore-by-activity onclick events */
        var userLastScoreByActivity = lrnReports.getReport('report-5');

        userLastScoreByActivity.on('click:score', function (data) {
            commonFunction(data, 'lrn-report-lastscore-user-events', true);
        });

        userLastScoreByActivity.on('click:user', function (data) {
            commonFunction(data, 'lrn-report-lastscore-user-events', false);
        });

        userLastScoreByActivity.on('click:activity', function (data) {
            commonFunction(data, 'lrn-report-lastscore-user-events', false);
        });

        /* group-lastscore-by-item onclick events */
        var groupLastScoreByItem = lrnReports.getReport('report-7');
        groupLastScoreByItem.on('click:score', function (data) {
            commonFunction(data, 'lrn-report-lastscore-item-events', true);
        });

        groupLastScoreByItem.on('click:user', function (data) {
            commonFunction(data, 'lrn-report-lastscore-item-events', false);
        });

        /* group-lastscore-by-tag onclick events */
        var groupLastScoreByTag = lrnReports.getReport('report-8');
        groupLastScoreByTag.on('click:score', function (data) {
            commonFunction(data, 'lrn-report-lastscore-tag-events', true);
        });

        groupLastScoreByTag.on('click:user', function (data) {
            commonFunction(data, 'lrn-report-lastscore-tag-events', false);
        });

        // Sessions detail hidden width fix
        $('a#lrn-nav-session-detail').click(function (e) {
            e.preventDefault();
            $(this).tab('show');
            $('.lrn_response_innerbody').width('100%');
        });
    }
</script>

<?php
    include_once 'views/modals/initialisation-preview.php';
    include_once 'includes/footer.php';
