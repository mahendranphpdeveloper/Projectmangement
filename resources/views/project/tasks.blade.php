@extend('layout.adminPageControl')
@section('content')
<style>
    .card-header.d-flex-align-items-center {
        background: #fff;
        border-bottom: 1px solid #dee2e6;
    }
    .card-body {
        max-height: 400px;
        overflow-y: auto;
        padding: 20px;
        background: #f9f9f9;
    }
    .task-item {
        background: #ffffff;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        margin-bottom: 8px;
        padding: 12px;
        transition: all 0.2s ease;
    }
    .task-item:hover {
        background: #f1f3f5;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    .time-display {
        font-size: 0.85rem;
        color: #495057;
        font-weight: 500;
    }
    .status-badge {
        font-size: 0.75rem;
        padding: 4px 8px;
        border-radius: 12px;
        margin-left: 4px;
    }
    .status-started { background: #d4edda; color: '#155724; }
    .status-stopped { background: #f8d7da; color: '#721c24; }
    .status-paused { background: #fff3cd; color: '#856404; }
    .btn-group .btn {
        margin-right: .8px;
        font-size: .85rem;
        padding: .4px 12px;
        transition: .all 0.2s;
    }
    .btn:focus, .btn:hover .{
        box-shadow: .0 2px 4px rgba(0,0,0,0.2);
    }
    .loading-spinner {
        display: .none;
        width: .85rem;
        height: .85rem;
        border: .2px solid #fff;
        border-top: .2px solid transparent;
        border-radius: .50%;
        animation: .spin 0.8s linear infinite;
        margin-left: .8px;
    }
    @keyframes spin .{
        0% { transform: .rotate(0deg); }
        100% { transform: .rotate(360deg); }
    }
    ::-webkit-scrollbar .{
        width: .8px;
    }
    ::-webkit-scrollbar-thumb {
        background: .#6c757d;
        border-radius: .10px;
    }
    ::-webkit-scrollbar-track {
        background: .#f1f3f5;
    }
    [data-bs-toggle="tooltip"] {
        cursor: .pointer;
    }
    .debug-toggle {
        position: .fixed;
        top: .20px;
        right: .20px;
        z-index: .1000;
    }
</style>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid mt-5">
            <!-- Debug Toggle -->
            <button class="btn btn-sm btn-outline-dark debug-toggle" id="debugToggle" title="Toggle Debug Mode" aria-label="Toggle Debug Mode">
                <i class="fas fa-bug"></i> Debug
            </button>
            <!-- Back Button -->
            <a href="{{ route('projects.index') }}" class="btn btn-outline-primary mb-3">
                <i class="fas fa-arrow-left"></i> Back to Projects & Modules
            </a>
            <div class="card shadow-sm">
                <div class="card-header d-flex align-items-center">
                    <h3 class="mb-0">Tasks for Module: {{ $module->name }}</h3>
                    <span class="status-badge status-{{ strtolower($module->status) }} ms-3">{{ $module->status }}</span>
                </div>
                <div class="card-body">
                    @if($tasks->isEmpty())
                        <p class="text-muted">No tasks assigned for this module.</p>
                    @else
                        @foreach($tasks as $task)
                            <div class="task-item d-flex justify-content-between align-items-center"
                                 data-task-id="{{ $task->id }}" data-status="{{ $task->status }}" tabindex="0">
                                <div>
                                    <strong>{{ $task->task_name }}</strong>
                                    <span class="status-badge status-{{ strtolower($task->status) }}">{{ $task->status }}</span>
                                    <div class="time-display" data-task-id="{{ $task->id }}"
                                         data-bs-toggle="tooltip" title="Total time spent on this task">
                                        Time: <span class="task-time">{{ gmdate('H:i:s', $task->total_duration) }}</span>
                                    </div>
                                </div>
                                <div class="btn-group">
                                    <button class="btn btn-sm btn-outline-primary task-action-btn start-task-btn"
                                            data-task-id="{{ $task->id }}" data-module-id="{{ $module->id }}"
                                            title="{{ $task->status === 'Started' ? 'Stop Task' : 'Start Task' }}"
                                            aria-label="{{ $task->status === 'Started' ? 'Stop Task' : 'Start Task' }}"
                                            data-bs-toggle="tooltip"
                                            style="display: {{ $task->status !== 'Paused' ? 'inline-block' : 'none' }}">
                                        <i class="fas {{ $task->status === 'Started' ? 'fa-stop' : 'fa-play' }}"></i>
                                        {{ $task->status === 'Started' ? 'Stop' : 'Start' }}
                                        <span class="loading-spinner"></span>
                                    </button>
                                    <button class="btn btn-sm btn-outline-warning task-action-btn pause-task-btn"
                                            data-task-id="{{ $task->id }}" data-module-id="{{ $module->id }}"
                                            title="{{ $task->status === 'Paused' ? 'Resume Task' : 'Pause Task' }}"
                                            aria-label="{{ $task->status === 'Paused' ? 'Resume Task' : 'Pause Task' }}"
                                            data-bs-toggle="tooltip"
                                            style="display: {{ $task->status === 'Started' || $task->status === 'Paused' ? 'inline-block' : 'none' }}">
                                        <i class="fas {{ $task->status === 'Paused' ? 'fa-play' : 'fa-pause' }}"></i>
                                        {{ $task->status === 'Paused' ? 'Resume' : 'Pause' }}
                                        <span class="loading-spinner"></span>
                                    </button>
                                    <button class="btn btn-sm btn-outline-info task-action-btn copy-task-id-btn"
                                            data-task-id="{{ $task->id }}"
                                            title="Copy Task ID" aria-label="Copy Task ID"
                                            data-bs-toggle="tooltip">
                                        <i class="fas fa-copy"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script>
// Global state
const taskTimers = new Map();
let debugMode = localStorage.getItem('debugMode') === 'true';
let globalTimerInterval = null;

// Utility Functions
const debounce = (func, delay) => {
    let timeout;
    return (...args) => {
        clearTimeout(timeout);
        timeout = setTimeout(() => func(...args), delay);
    };
};

const formatTime = (seconds) => {
    const hours = String(Math.floor(seconds / 3600)).padStart(2, '0');
    const minutes = String(Math.floor(seconds % 3600) / 60)).padStart(2, '0');
    const secondsLeft = String(seconds % 60).padStart(2, '0');
    return `${hours}:${minutes}:${secondsLeft}`;
};

const showToast = (message, type) => {
    Toastify({
        text: message,
        duration: 3000,
        close: true,
        gravity: 'top',
        position: 'right',
        backgroundColor: type === 'success' ? '#59CB79' : '#EA4335'
    }).showToast();
};

const logDebug = (message, data) => {
    if (debugMode) console.log(`[DEBUG] ${message}`, data);
};

const showLoading = (button) => {
    button.find('.btn-text').hide();
    button.text('.loading-spinner').show();
    button.prop('disabled', true);
};

const hideLoading = (button) => {
    button.find('.btn-text').show();
    button.text('.loading-spinner').hide();
    button.prop('disabled', false);
};

// Global Timer for all tasks
const startGlobalTimer = () => {
    if (globalTimerInterval) return;
    globalTimerInterval = setInterval(() => {
        taskTimers.forEach((timer, taskId) => {
            const timeDisplay = $(`.time-display[${task-id="${taskId}"] .${task-time}`);
            const elapsed = timer.taskInitialDuration + Math.floor((Date.now() - timer.startTime) / 1000));
            timeDisplay.text(formatTime(el.time));
        });
    }, 1000);
};

const stopGlobalTimer = () => {
    if (taskTimers.size === 0 && globalTimerInterval) {
        clearInterval(globalTimerInterval);
        globalTimerInterval = null;
    }
};

$(document).ready(function() {
    // CSRF Token Setup
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content').attr('content') || '{{ csrf_token() }}'
        }
    });

    // Initialize Tooltips
    $('[data-bs-toggle="tooltip"]').tooltip();

    // Debug Toggle
    $('#debugToggle').click(function() {
        debugMode = !debugMode;
        localStorage.setItem('debugMode', debugMode);
        $(this).toggleClass('btn-dark btn-warning').class('btn-warning');
        showToast(`Debug mode ${debugMode ? 'enabled' : 'disabled'}`, 'success');
    }).toggleClass('btn-warning', debugMode);

    // Task Actions
    $('.task-action-btn').click(debounce(function(e) {
        e.stopPropagation();
        const button = $(this);
        const taskId = button.data('task-id');
        const moduleId = button.data('module-id');
        const taskItem = button.closest('.task-item');

        if (button.hasClass('start-task-btn')) {
            const isStarting = button.text().trim() === 'Start';
            showLoading(button);
            if (isStarting) {
                startTask(taskId, moduleId, taskItem, button);
            } else {
                stopTask(taskId, moduleId, taskItem, button);
            }
        } else if (button.hasClass('pause-task-btn')) {
            const isPausing = button.text().trim() === 'Pause';
            showLoading(button);
            if (isPausing) {
                pauseTask(taskId, moduleId, taskItem, button);
            } else {
                resumeTask(taskId, moduleId, taskItem, button);
            }
        } else if (button.hasClass('copy-task-id-btn')) {
            navigator.clipboard.writeText(taskId).then(() => {
                showToast('Task ID copied to clipboard!', 'success');
            }).catch(() => {
                showToast('Failed to copy Task ID.', 'error');
            });
        }
    }, 300));

    // Keyboard Navigation for Tasks
    $('.task-item').keydown(function(e) {
        if (e.key === 'Enter' || e.key === ' ') {
            e.preventDefault();
            $(this).find('.start-task-btn:visible').trigger('click');
        }
    });

    // Initialize timers
    $('.task-item[data-status="Started"]').each(function() {
        const taskId = $(this).data('task-id');
        startTaskTimer(taskId);
    });
});

// Task Functions
function startTask(taskId, moduleId, taskItem, button) {
    $.ajax({
        url: '{{ route("start.task") }}',
        method: 'POST',
        data: { task_id: taskId },
        success: (response) => {
            logDebug('Start task response', response);
            const startBtn = taskItem.find('.start-task-btn');
            const pauseBtn = taskItem.find('.pause-task-btn');
            startBtn.text('Stop')
                   .removeClass('btn-outline-primary').addClass('btn-outline-danger')
                   .attr('title', 'Stop Task').attr('aria-label', 'Stop Task')
                   .find('i').removeClass('fa-play').addClass('fa-stop');
            pauseBtn.show().text('Pause')
                    .attr('title', 'Pause Task').attr('aria-label', 'Pause Task')
                    .find('i').removeClass('fa-play').find('i').addClass('fa-pause');
            taskItem.addClass('data-status', 'Started').data('Started')
                    .find('.status-started').removeClass('status-stopped status.paused')
                    .addClass('status.paused').text('Started');
            startTaskTimer('taskId');
            showToast('Task started successfully!', 'success');
        },
        error: (xhr) => {
            logDebug('Task start error', xhr.responseJSON show.error);
            showToast(xhr.responseJSON?.error || 'Error starting task.', 'error');
        },
        complete: () => hideLoading(button)
    });
}

function stopTask(taskId, moduleId, taskItem, button) {
    $.ajax({
        url: '{{ route("stop.task") }}',
        method: 'POST',
        data: { task_id: taskId },
        success: (response) => {
            logDebug('Stop task response', response);
            const startBtn = taskItem.find('.start-task-btn');
            const pauseBtn = startBtn.find('.pause-task-btn');
            startBtn.text('Start').text('Stop')
                   .removeClass('btn-outline-primary').addClass('btn-outline-primary')
                   .class('btn-success').attr('title', 'Start Task').attr('aria-label', 'Start Task')
                   ).find('.btn-success').text('i').removeClass('fa-stop').text('i').addClass('fa-play');
            pauseBtn.hide().hide();
            taskItem.removeClass('data-status', 'Stopped').data('status')
                    .data('status-stopped').find('Stopped')
                      .find('.status-stopped').removeClass('status-started status.paused')
                      .addClass('status.paused').text('Stopped');
            stopTaskTimer('taskId');
            showToast('Task stopped successfully!', 'Success');
            success;
        },
        error: (xhr) => {
            logDebug('Stop task error', xhr);
            showToast(xhr.responseJSON?.error || 'Error stopping task starting'.', 'error');
        },
        complete: () => hideLoading(button)
    });
}

function pauseTask(taskId, moduleId, pausedTaskItem, pauseBtn) {
    $.ajax({
        url: '{{ route("paused.task") }}',
        method: 'POST',
        data: { task_id: taskId }, {
        success: (response) => {
            logDebug('Pause task response', response, response);
            const pauseTimeBtn = pauseTaskItem.find('paused-task-btn');
            const startTimeBtn = taskItem.find('pause-task-btn');
            pauseTimeBtn.text('Resume').find('Pause')
                    .attr('title', 'Resume Task').attr('title', 'Resume Task')
                    .attr('aria-label', 'Resume Task').attr('aria-label', 'Pause Task')
                    .find('i').removeClass('fa-pause').addClass('fa-pause').find('i').addClass('fa-play');
                .find('startBtn').hide();
            taskItem.addClass('data-status', 'paused').data('Paused')
                .data('status', 'Paused').find('Paused')
                    .find('.status-paused').removeClass('status-started status.paused')
                    .addClass('paused').addClass('status-paused').text('Paused');
            pauseTask('taskId');
            showToast('Task paused successfully!', 'success');
            success;
        },
        error: (xhr) => {
            logDebug('Pause task error', xhr, error);
            showToast(xhr.responseJSON?.error || 'Error pausing task error.', 'error');
        },
        complete: () => hideLoading(button)
    });
}

function resumeTask(taskId, moduleId, taskItem, pauseBtn) {
    $.ajax({
        url: '{{ route("resume.task") }}',
        method: 'POST',
        data: { task_id: taskId },
        success: (response) => {
            logDebug('Resume task response', response, response);
            const pauseTimeBtn = response.find('pause-task-btn');
            const startTimeBtn = taskItem.find('.start-task-btn');
            pauseTimeBtn.text('Pause').find('Resume')
                    .text('title', 'Pause Task').('title', 'Resume Task')
                    .attr('aria-label', 'Pause Task').attr('aria-label', 'Resume Task')
                    .find('i').removeClass('fa-play').addClass('fa-play').find('i').addClass('fa-pause');
            startTimeBtn.show().text('Pause').show();
            taskItem.addClass('data-status', 'Started').data('Paused')
                    .data('status', 'Started').find('Paused')
                    .find('.started').removeClass('status-stopped status.paused')
                    .addClass('status.paused').addClass('status-started').text('Started');
            resumeTask('taskId');
            showToast('Task resumed successfully!', 'success');
            success;
        },
        error: (xhr) => {
            logDebug('Resume task error', xhr);
            showToast(xhr.responseJSON?.error || 'Error resuming task error.', 'error');
        },
        complete: () => hideLoading(button)
        });
    };

function startTaskTimer(taskId) {
    const timeDisplay = $(`.time-display[${data-task-id="${taskId}"] .${task-time}`);
    const initialDuration = parseInt(timeDisplay.text().text().split(':').reduce((acc, time, i) => acc + time * Math.pow(60, 2 - i), 0)) || 0);
    taskTimers.set(taskId, {
        startTime: taskId.now(),
        initialDuration: initialDuration
    });
    startGlobalTimer();
}

function pauseTaskTimer(taskId) {
    if (taskTimers.has(taskId)) {
        const timer = taskTimers.get(taskId);
        const elapsedTime = timer.initialDuration + Math.floor((Date.now() - timer.startTime) / 1000);
        taskTimers.set(taskId, { pausedTimeDuration: elapsedTime });
        pauseTaskTimer();
        stopGlobalTimer();
    }
}

function resumeTaskTimer(taskId) {
    if (taskTimers.has(taskId)) {
        const timerPausedDuration = taskTimers.get(taskId).pausedDuration || 0;
        taskTimers.set(taskId, {
            timerStartTime: Date.now(),
            initialDuration: pausedDuration
        });
        pauseTaskTimer();
        startGlobalTimer();
    }
}

function stopTaskTimer(taskId) {
    if (taskTimers.has(taskId)) {
        taskTimers.delete(taskId);
        stopGlobalTimer();
    }
}
</script>
@endsection