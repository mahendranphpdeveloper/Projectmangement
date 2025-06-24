@extends('layout.adminPageControl')
@section('content')
@php
use Illuminate\Support\Str;
@endphp
<style>
    .card-header.d-flex.align-items-center {
        background: #fff;
        border-bottom: 1px solid #dee2e6;
        padding: 15px;
    }
    .card-body.project-modules {
        max-height: 400px;
        overflow-y: auto;
        padding: 20px;
        background: #f9f9f9;
    }
    .module-item, .task-item {
        background: #ffffff;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        margin-bottom: 12px;
        padding: 15px;
        transition: all 0.2s ease;
    }
    .module-item:hover, .task-item:hover {
        background: #f1f3f5;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    .task-item {
        margin-left: 30px;
        font-size: 0.95rem;
    }
    .time-display {
        font-size: 0.85rem;
        color: #495057;
        font-weight: 500;
    }
    .status-badge {
        font-size: 0.75rem;
        padding: 5px 10px;
        border-radius: 12px;
        margin-left: 8px;
    }
    .status-started { background: #d4edda; color: #155724; }
    .status-stopped { background: #f8d7da; color: #721c24; }
    .status-paused { background: #fff3cd; color: #856404; }
    .btn-group .btn {
        margin-right: 8px;
        font-size: 0.85rem;
        padding: 6px 14px;
        transition: all 0.2s;
    }
    .btn:focus, .btn:hover {
        box-shadow: 0 2px 4px rgba(0,0,0,0.2);
    }
    .loading-spinner {
        display: none;
        width: 18px;
        height: 18px;
        border: 3px solid #fff;
        border-top: 3px solid transparent;
        border-radius: 50%;
        animation: spin 0.8s linear infinite;
        margin-left: 8px;
        vertical-align: middle;
    }
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
    .summary-time {
        font-size: 0.8rem;
        color: #6c757d;
        margin-top: 8px;
    }
    ::-webkit-scrollbar {
        width: 8px;
    }
    ::-webkit-scrollbar-thumb {
        background: #6c757d;
        border-radius: 10px;
    }
    ::-webkit-scrollbar-track {
        background: #f1f3f5;
    }
    [data-bs-toggle="tooltip"] {
        cursor: pointer;
    }
    .debug-toggle {
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 1000;
    }
    @media (max-width: 768px) {
        .card-container .col-md-4 {
            flex: 0 0 100%;
            max-width: 100%;
        }
        .project-image {
            width: 50px !important;
            height: 50px !important;
        }
        .btn-group .btn {
            padding: 4px 10px;
            font-size: 0.8rem;
        }
    }
</style>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid mt-5">
            <!-- Debug Toggle -->
            <button class="btn btn-sm btn-outline-dark debug-toggle" id="debugToggle" title="Toggle Debug Mode" aria-label="Toggle Debug Mode">
                <i class="fas fa-bug"></i> Debug
            </button>
            <div class="card-container row">
                @if($projects->isEmpty())
                    <div class="alert alert-info text-center w-100">
                        <p>No projects assigned.</p>
                    </div>
                @else
                    @foreach($projects as $project)
                        <div class="col-md-4 mb-4">
                            <div class="card shadow-sm project-card" data-project-id="{{ $project->id }}" data-status="{{ $project->status }}" role="region" aria-label="Project {{ $project->name }}">
                                <!-- Project Card Header -->
                                <div class="card-header d-flex align-items-center">
                                    <img src="{{ asset($project->projectControls->pro_image ?? 'images/default-project.png') }}" alt="{{ $project->name }}"
                                         class="project-image" style="width: 70px; height: 70px; object-fit: contain; border-radius: 50%; margin-right: 15px;">
                                    <div class="flex-grow-1">
                                        <h5 class="mb-1">
                                            {{ Str::limit($project->name, 25) }}
                                            <span class="status-badge status-{{ strtolower($project->status) }}">{{ $project->status }}</span>
                                        </h5>
                                        <p class="text-muted mb-0">{{ Str::limit($project->description, 50) }}</p>
                                        <div class="summary-time">
                                            Total Time: <span class="project-time">{{ gmdate('H:i:s', $project->total_duration ?? 0) }}</span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <button class="btn btn-primary start-project-btn" data-project-id="{{ $project->id }}"
                                                title="{{ $project->status === 'Started' ? 'Stop Project' : 'Start Project' }}"
                                                aria-label="{{ $project->status === 'Started' ? 'Stop Project' : 'Start Project' }}"
                                                data-bs-toggle="tooltip">
                                            <i class="fas {{ $project->status === 'Started' ? 'fa-stop' : 'fa-play' }}"></i>
                                            <span class="btn-text">{{ $project->status === 'Started' ? 'Stop' : 'Start' }}</span>
                                            <span class="loading-spinner"></span>
                                        </button>
                                        <button class="btn btn-outline-success quick-start-btn ms-2" data-project-id="{{ $project->id }}"
                                                title="Start All Modules & Tasks" aria-label="Start All Modules & Tasks" data-bs-toggle="tooltip"
                                                style="display: {{ $project->status === 'Stopped' ? 'inline-block' : 'none' }}">
                                            <i class="fas fa-rocket"></i>
                                        </button>
                                    </div>
                                </div>
                                <!-- Modules List -->
                                <div class="card-body project-modules" style="region={{ $project->status === 'Started' ? 'show' : 'hide' }}">
                                    <div class="card-body project-modules" style="display: {{ $project->status === 'Started' ? 'block' : 'none' }};">
                                    <h6 class="text-secondary mb-3">Modules:</h6>
                                    @if($project->module->isEmpty())
                                        <p class="text-muted">No modules assigned for this project.</p>
                                    @else
                                        @foreach($project->module as $module)
                                            <div class="module-item d-flex justify-content-between align-items-center"
                                                 data-module-id="{{ $module->id }}" data-status="{{ $module->status }}" role="region" aria-label="Module {{ $module->name }}">
                                                <div>
                                                    <h6 class="mb-1">
                                                        {{ Str::limit($module->name, 25) }}
                                                        <span class="status-badge status-{{ strtolower($module->status) }}">{{ $module->status }}</span>
                                                    </h6>
                                                    <small class="text-muted">{{ Str::limit($module->description, 40) }}</small>
                                                    <div class="summary-time">
                                                        Total Time: <span class="module-time">{{ gmdate('H:i:s', $module->total_duration ?? 0) }}</span>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <button class="btn btn-success start-module-btn"
                                                            data-module-id="{{ $module->id }}"
                                                            title="{{ $module->status === 'Started' ? 'Stop Module' : 'Start Module' }}"
                                                            aria-label="{{ $module->status === 'Started' ? 'Stop Module' : 'Start Module' }}"
                                                            data-bs-toggle="tooltip">
                                                        <i class="fas {{ $module->status === 'Started' ? 'fa-stop' : 'fa-play' }}"></i>
                                                        <span class="btn-text">{{ $module->status === 'Started' ? 'Stop' : 'Start' }}</span>
                                                        <span class="loading-spinner"></span>
                                                    </button>
                                                    <button class="btn btn-outline-success quick-start-btn ms-2" data-module-id="{{ $module->id }}"
                                                            title="Start All Tasks" aria-label="Start All Tasks" data-bs-toggle="tooltip"
                                                            style="display: {{ $module->status === 'Stopped' ? 'inline-block' : 'none' }}">
                                                        <i class="fas fa-rocket"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <!-- Tasks List -->
                                            <div class="task-list" data-module-id="{{ $module->id }}" style="display: {{ $module->status === 'Started' ? 'block' : 'none' }};">
                                                <h6 class="text-secondary mb-2">Tasks:</h6>
                                                @if($module->tasks->isEmpty())
                                                    <p class="text-muted">No tasks assigned for this module.</p>
                                                @else
                                                    @foreach($module->tasks as $task)
                                                        <div class="task-item d-flex justify-content-between align-items-center"
                                                             data-task-id="{{ $task->id }}" data-status="{{ $task->status }}" role="tabpanel" aria-label="Task {{ $task->task_name }}">
                                                            <div>
                                                                <strong>{{ Str::limit($task->task_name, 30) }}</strong>
                                                                <span class="status-badge status-{{ strtolower($task->status) }}">{{ $task->status }}</span>
                                                                <div class="time-display" data-task-id="{{ $task->id }}"
                                                                     title="Total time spent on this task" data-bs-toggle="tooltip">
                                                                    Time: <span class="task-time">{{ gmdate('H:i:s', $task->total_duration ?? 0) }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="btn-group">
                                                                <button class="btn btn-sm btn-outline-primary start-task-btn task-action-btn"
                                                                        data-task-id="{{ $task->id }}" data-module-id="{{ $module->id }}"
                                                                        title="{{ $task->status === 'Started' ? 'Stop Task' : 'Start Task' }}"
                                                                        aria-label="{{ $task->status === 'Started' ? 'Stop Task' : 'Start Task' }}"
                                                                        data-bs-toggle="tooltip"
                                                                        style="display: {{ $task->status !== 'Paused' ? 'inline-block' : 'none' }}">
                                                                    <i class="fas {{ $task->status === 'Started' ? 'fa-stop' : 'fa-play' }}"></i>
                                                                    <span class="btn-text">{{ $task->status === 'Started' ? 'Stop' : 'Start' }}</span>
                                                                    <span class="loading-spinner"></span>
                                                                </button>
                                                                <button class="btn btn-sm btn-outline-warning pause-task-btn task-action-btn"
                                                                        data-task-id="{{ $task->id }}" data-module-id="{{ $module->id }}"
                                                                        title="{{ $task->status === 'Paused' ? 'Resume Task' : 'Pause Task' }}"
                                                                        aria-label="{{ $task->status === 'Paused' ? 'Resume Task' : 'Pause Task' }}"
                                                                        data-bs-toggle="tooltip"
                                                                        style="display: {{ $task->status === 'Started' || $task->status === 'Paused' ? 'inline-block' : 'none' }}">
                                                                    <i class="fas {{ $task->status === 'Paused' ? 'fa-play' : 'fa-pause' }}"></i>
                                                                    <span class="btn-text">{{ $task->status === 'Paused' ? 'Resume' : 'Pause' }}</span>
                                                                    <span class="loading-spinner"></span>
                                                                </button>
                                                                <button class="btn btn-sm btn-outline-info copy-task-id-btn task-action-btn"
                                                                        data-task-id="{{ $task->id }}"
                                                                        title="Copy Task ID" aria-label="Copy Task ID"
                                                                        data-bs-toggle="tooltip">
                                                                    <i class="fas fa-copy"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
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
    if (!seconds || seconds < 0) return '00:00:00';
    const hours = String(Math.floor(seconds / 3600)).padStart(2, '0');
    const minutes = String(Math.floor((seconds % 3600) / 60)).padStart(2, '0');
    const secondsLeft = String(seconds % 60).padStart(2, '0');
    return `${hours}:${minutes}:${secondsLeft}`;
};

const showToast = (message, type = 'success') => {
    Toastify({
        text: message,
        duration: 3000,
        close: true,
        gravity: 'top',
        position: 'right',
        style: {
            background: type === 'success' ? '#59CB79' : '#EA4335'
        }
    }).showToast();
};

const logDebug = (message, data = {}) => {
    if (debugMode) console.log(`[DEBUG] ${message}`, data);
};

const showLoading = (button) => {
    button.find('.btn-text').hide();
    button.find('.loading-spinner').show();
    button.prop('disabled', true).attr('aria-busy', 'true');
};

const hideLoading = (button) => {
    button.find('.btn-text').show();
    button.find('.loading-spinner').hide();
    button.prop('disabled', false).removeAttr('aria-busy');
};

// Global Timer Management
const startGlobalTimer = () => {
    if (globalTimerInterval) return;
    globalTimerInterval = setInterval(() => {
        taskTimers.forEach((timer, taskId) => {
            const timeDisplay = $(`.time-display[data-task-id="${taskId}"] .task-time`);
            const elapsed = timer.initialDuration + Math.floor((Date.now() - timer.startTime) / 1000);
            timeDisplay.text(formatTime(elapsed));
            // Update module and project times
            updateParentTimes(taskId, elapsed);
        });
    }, 1000);
};

const stopGlobalTimer = () => {
    if (taskTimers.size === 0 && globalTimerInterval) {
        clearInterval(globalTimerInterval);
        globalTimerInterval = null;
    }
};

const updateParentTimes = (taskId, taskDuration) => {
    const taskItem = $(`.task-item[data-task-id="${taskId}"]`);
    const moduleItem = taskItem.closest('.module-item');
    const projectCard = moduleItem.closest('.project-card');
    const moduleTasks = moduleItem.next('.task-list').find('.task-item');
    
    // Calculate module total time
    let moduleTime = 0;
    moduleTasks.each(function() {
        const timeText = $(this).find('.task-time').text();
        const seconds = timeText.split(':').reduce((acc, time, i) => acc + parseInt(time) * Math.pow(60, 2 - i), 0);
        moduleTime += seconds;
    });
    moduleItem.find('.module-time').text(formatTime(moduleTime));

    // Calculate project total time
    const projectModules = projectCard.find('.module-item');
    let projectTime = 0;
    projectModules.each(function() {
        const timeText = $(this).find('.module-time').text();
        const seconds = timeText.split(':').reduce((acc, time, i) => acc + parseInt(time) * Math.pow(60, 2 - i), 0);
        projectTime += seconds;
    });
    projectCard.find('.project-time').text(formatTime(projectTime));
};

$(document).ready(function() {
    // CSRF Token Setup
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') || '{{ csrf_token() }}'
        }
    });

    // Initialize Tooltips
    $('[data-bs-toggle="tooltip"]').tooltip({ trigger: 'hover' });

    // Debug Toggle
    $('#debugToggle').on('click', function() {
        debugMode = !debugMode;
        localStorage.setItem('debugMode', debugMode);
        $(this).toggleClass('btn-dark btn-warning');
        showToast(`Debug mode ${debugMode ? 'enabled' : 'disabled'}`);
    }).toggleClass('btn-warning', debugMode);

    // Toggle project modules
    $('.project-card').on('click', function(e) {
        if ($(e.target).closest('button, .start-project-btn, .start-module-btn, .task-action-btn, .quick-start-btn').length) return;
        const projectModules = $(this).find('.project-modules');
        projectModules.stop().slideToggle(300, () => {
            $(this).attr('aria-expanded', projectModules.is(':visible'));
        });
        $('.project-modules').not(projectModules).slideUp(300);
    }).on('keydown', function(e) {
        if (e.key === 'Enter' || e.key === ' ') {
            e.preventDefault();
            $(this).trigger('click');
        }
    });

    // Toggle task list
    $('.module-item').on('click', function(e) {
        if ($(e.target).closest('button, .start-module-btn, .task-action-btn, .quick-start-btn').length) return;
        const taskList = $(this).next('.task-list');
        taskList.stop().slideToggle(300, () => {
            $(this).attr('aria-expanded', taskList.is(':visible'));
        });
        $('.task-list').not(taskList).slideUp(300);
    }).on('keydown', function(e) {
        if (e.key === 'Enter' || e.key === ' ') {
            e.preventDefault();
            $(this).trigger('click');
        }
    });

    // Start/Stop Project
    $('.start-project-btn').on('click', debounce(function(e) {
        e.stopPropagation();
        const button = $(this);
        const projectId = button.data('project-id');
        const isStarting = button.hasClass('btn-primary');
        showLoading(button);

        $.ajax({
            url: isStarting ? '{{ route("start.project") }}' : '{{ route("stop.project") }}',
            method: 'POST',
            data: { project_id: projectId },
            success: (response) => {
                logDebug('Project action response', response);
                button.toggleClass('btn-primary btn-danger')
                      .attr({
                          'title': isStarting ? 'Stop Project' : 'Start Project',
                          'aria-label': isStarting ? 'Stop Project' : 'Start Project'
                      })
                      .find('.btn-text').text(isStarting ? 'Stop' : 'Start')
                      .end()
                      .find('i').toggleClass('fa-play fa-stop');
                const projectCard = button.closest('.project-card');
                projectCard.data('status', isStarting ? 'Started' : 'Stopped')
                          .attr('data-status', isStarting ? 'Started' : 'Stopped')
                          .find('.status-badge')
                          .removeClass('status-started status-stopped')
                          .addClass(`status-${isStarting ? 'started' : 'stopped'}`)
                          .text(isStarting ? 'Started' : 'Stopped');
                projectCard.find('.quick-start-btn').toggle(!isStarting);
                projectCard.find('.project-modules').slideToggle(isStarting);
                showToast(`Project ${isStarting ? 'started' : 'stopped'} successfully!`);
            },
            error: (xhr) => {
                logDebug('Project action error', xhr);
                showToast(xhr.responseJSON?.error || `Error ${isStarting ? 'starting' : 'stopping'} project.`, 'error');
            },
            complete: () => hideLoading(button)
        });
    }, 300));

    // Quick Start Project
    $('.quick-start-btn[data-project-id]').on('click', debounce(function(e) {
        e.stopPropagation();
        const button = $(this);
        const projectId = button.data('project-id');
        showLoading(button);

        $.ajax({
            url: '{{ route("start.project") }}',
            method: 'POST',
            data: { project_id: projectId, quick_start: true },
            success: (response) => {
                logDebug('Quick start project response', response);
                const projectCard = button.closest('.project-card');
                projectCard.find('.start-project-btn')
                          .removeClass('btn-primary').addClass('btn-danger')
                          .attr({
                              'title': 'Stop Project',
                              'aria-label': 'Stop Project'
                          })
                          .find('.btn-text').text('Stop')
                          .end()
                          .find('i').removeClass('fa-play').addClass('fa-stop');
                projectCard.data('status', 'Started')
                          .attr('data-status', 'Started')
                          .find('.status-badge')
                          .removeClass('status-stopped').addClass('status-started')
                          .text('Started');
                button.hide();
                projectCard.find('.project-modules').slideDown(300);
                projectCard.find('.start-module-btn').filter('.btn-success').trigger('click');
                showToast('Project and modules started successfully!');
            },
            error: (xhr) => {
                logDebug('Quick start project error', xhr);
                showToast(xhr.responseJSON?.error || 'Error quick-starting project.', 'error');
            },
            complete: () => hideLoading(button)
        });
    }, 300));

    // Start/Stop Module
    $('.start-module-btn').on('click', debounce(function(e) {
        e.stopPropagation();
        const button = $(this);
        const moduleId = button.data('module-id');
        const isStarting = button.hasClass('btn-success');
        const projectStatus = button.closest('.project-card').data('status');
        if (isStarting && projectStatus !== 'Started') {
            showToast('Cannot start module: Parent project is not started.', 'error');
            return;
        }
        showLoading(button);

        $.ajax({
            url: isStarting ? '{{ route("start.module") }}' : '{{ route("stop.module") }}',
            method: 'POST',
            data: { module_id: moduleId },
            success: (response) => {
                logDebug('Module action response', response);
                button.toggleClass('btn-success btn-danger')
                      .attr({
                          'title': isStarting ? 'Stop Module' : 'Start Module',
                          'aria-label': isStarting ? 'Stop Module' : 'Start Module'
                      })
                      .find('.btn-text').text(isStarting ? 'Stop' : 'Start')
                      .end()
                      .find('i').toggleClass('fa-play fa-stop');
                const moduleItem = button.closest('.module-item');
                moduleItem.data('status', isStarting ? 'Started' : 'Stopped')
                          .attr('data-status', isStarting ? 'Started' : 'Stopped')
                          .find('.status-badge')
                          .removeClass('status-started status-stopped')
                          .addClass(`status-${isStarting ? 'started' : 'stopped'}`)
                          .text(isStarting ? 'Started' : 'Stopped');
                moduleItem.find('.quick-start-btn').toggle(!isStarting);
                moduleItem.next('.task-list').slideToggle(isStarting);
                showToast(`Module ${isStarting ? 'started' : 'stopped'} successfully!`);
            },
            error: (xhr) => {
                logDebug('Module action error', xhr);
                showToast(xhr.responseJSON?.error || `Error ${isStarting ? 'starting' : 'stopping'} module.`, 'error');
            },
            complete: () => hideLoading(button)
        });
    }, 300));

    // Quick Start Module
    $('.quick-start-btn[data-module-id]').on('click', debounce(function(e) {
        e.stopPropagation();
        const button = $(this);
        const moduleId = button.data('module-id');
        showLoading(button);

        $.ajax({
            url: '{{ route("start.module") }}',
            method: 'POST',
            data: { module_id: moduleId, quick_start: true },
            success: (response) => {
                logDebug('Quick start module response', response);
                const moduleItem = button.closest('.module-item');
                moduleItem.find('.start-module-btn')
                    .removeClass('btn-success').addClass('btn-danger')
                    .attr({
                        'title': 'Stop Module',
                        'aria-label': 'Stop Module'
                    })
                    .find('.btn-text').text('Stop')
                    .end()
                    .find('i').removeClass('fa-play').addClass('fa-stop');
                moduleItem.data('status', 'Started')
                    .attr('data-status', 'Started')
                    .find('.status-badge')
                    .removeClass('status-stopped').addClass('status-started')
                    .text('Started');
                button.hide();
                moduleItem.next('.quick-start-btn').slideDown(300);
                moduleItem.next('.start-task-btn').filter(':contains("Start")').trigger('click');
                showToast('Module and tasks started successfully!');
            },
            error: (xhr) => {
                logDebug('Quick start module error', xhr);
                showToast(xhr.responseJSON?.error || 'Error quick-starting module.', 'error');
            },
            complete: () => hideLoading(button)
        });
    }, 300));

    // Task Actions
    $('.task-action-btn').on('click', debounce(function(e) {
        e.stopPropagation();
        const button = $(this);
        const taskId = button.data('task-id');
        const moduleId = button.data('module-id');
        const taskItem = button.closest('.task-item');
        const projectStatus = button.closest('.project-card').data('status');
        const moduleStatus = button.closest('.module-item').data('status');

        if (button.hasClass('start-task-btn')) {
            const isStarting = button.find('.btn-text').text().trim() === 'Start';
            if (isStarting && (projectStatus !== 'Started' || moduleStatus !== 'Started')) {
                showToast('Cannot start task: Parent project or module is not started.', 'error');
                return;
            }
            showLoading(button);
            if (isStarting) {
                startTask(taskId, moduleId, taskItem, button);
            } else {
                stopTask(taskId, moduleId, taskItem, button);
            }
        } else if (button.hasClass('pause-task-btn')) {
            const isPausing = button.find('.btn-text').text().trim() === 'Pause';
            showLoading(button);
            if (isPausing) {
                pauseTask(taskId, button);
            } else {
                resumeTask(taskId, moduleId, taskItem, button);
            }
        } else if (button.hasClass('copy-task-id-btn')) {
            navigator.clipboard.writeText(taskId).then(() => {
                showToast('Task ID copied to clipboard!');
            }).catch(() => {
                showToast('Failed to copy Task ID.', 'error');
            });
        }
    }, 300));

    // Keyboard Navigation for Tasks
    $('.task-item').on('keydown', function(e) {
        if (['Enter', ' '].includes(e.key)) {
            e.preventDefault();
            $(this).find('.start-task-btn:visible').first().trigger('click');
        }
    });

    // Initialize timers for started tasks
    $('.task-item[data-status="Started"]').each(function() {
        startTaskTimer($(this).data('task-id'));
    });
});

// Task Functions
function startTask(taskId, moduleId, taskItem, button) {
    $.ajax({
        url: '{{ route("start.task") }}',
        method: 'POST',
        data: { task_id: taskId },
        success: (response) => {
            logDebug('Task started', response);
            button.removeClass('btn-outline-primary').addClass('btn-outline-danger')
                  .attr({
                      'title': 'Stop Task',
                      'aria-label': 'Stop Task'
                  })
                  .find('.btn-text').text('Stop')
                  .end()
                  .find('i').removeClass('fa-play').addClass('fa-stop');
            taskItem.find('.pause-task-btn').show()
                    .find('.btn-text').text('Pause')
                    .attr({
                        'title': 'Pause Task',
                        'aria-label': 'Pause Task'
                    })
                    .find('i').removeClass('fa-play').addClass('fa-pause');
            taskItem.data('status', 'Started')
                    .attr('data-status', 'Started')
                    .find('.status-badge')
                    .removeClass('status-stopped status-paused')
                    .addClass('status-started')
                    .text('Started');
            startTaskTimer(taskId);
            showToast('Task started successfully!');
        },
        error: (xhr) => {
            logDebug('Start task error', xhr);
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
            logDebug('Task stopped', response);
            button.removeClass('btn-outline-danger').addClass('btn-outline-primary')
                  .attr({
                      'title': 'Start Task',
                      'aria-label': 'Start Task'
                  })
                  .find('.btn-text').text('Start')
                  .end()
                  .find('i').removeClass('fa-stop').addClass('fa-play');
            taskItem.find('.pause-task-btn').hide();
            taskItem.data('status', 'Stopped')
                    .attr('data-status', 'Stopped')
                    .find('.status-badge')
                    .removeClass('status-started status-paused')
                    .addClass('status-stopped')
                    .text('Stopped');
            stopTaskTimer(taskId);
            showToast('Task stopped successfully!');
        },
        error: (xhr) => {
            logDebug('Stop task error', xhr);
            showToast(xhr.responseJSON?.error || 'Error stopping task.', 'error');
        },
        complete: () => hideLoading(button)
    });
}

function pauseTask(taskId, button) {
    $.ajax({
        url: '{{ route("pause.task") }}',
        method: 'POST',
        data: { task_id: taskId },
        success: (response) => {
            logDebug('Task paused', response);
            button.find('.btn-text').text('Resume')
                  .attr({
                      'title': 'Resume Task',
                      'aria-label': 'Resume Task'
                  })
                  .find('i').removeClass('fa-pause').addClass('fa-play');
            button.closest('.task-item').find('.start-task-btn').hide()
                    .data('status', 'Paused')
                    .attr('data-status', 'Paused')
                    .find('.status-badge')
                    .removeClass('status-started status-stopped')
                    .addClass('status-paused')
                    .text('Paused');
            pauseTaskTimer(taskId);
            showToast('Task paused successfully!');
        },
        error: (xhr) => {
            logDebug('Pause task error', xhr);
            showToast(xhr.responseJSON?.error || 'Error pausing task.', 'error');
        },
        complete: () => hideLoading(button)
    });
}

function resumeTask(taskId, moduleId, taskItem, button) {
    $.ajax({
        url: '{{ route("resume.task") }}',
        method: 'POST',
        data: { task_id: taskId },
        success: (response) => {
            logDebug('Task resumed', response);
            button.find('.btn-text').text('Pause')
                  .attr({
                      'title': 'Pause Task',
                      'aria-label': 'Pause Task'
                  })
                  .find('i').removeClass('fa-play').addClass('fa-pause');
            taskItem.find('.start-task-btn').show()
                    .data('status', 'Started')
                    .attr('data-status', 'Started')
                    .find('.status-badge')
                    .removeClass('status-stopped')
                    .addClass('status-paused')
                    .addClass('status-started')
                    .text('Started');
            resumeTaskTimer(taskId);
            showToast('Task resumed successfully!');
        },
        error: (xhr) => {
            logDebug('Resume task error', xhr);
            showToast(xhr.responseJSON?.error || 'Error resuming task.', 'error');
        },
        complete: () => hideLoading(button)
    });
}

function startTaskTimer(taskId) {
    const timeDisplay = $(`.time-display[data-task-id="${taskId}"] .task-time`);
    const initialDuration = parseInt(timeDisplay.text().split(':').reduce((acc, time, i) => acc + time * Math.pow(60, 2 - i), 0)) || 0;
    taskTimers.set(taskId, {
        startTime: Date.now(),
        initialDuration
    });
    startGlobalTimer();
}

function pauseTaskTimer(taskId) {
    if (taskTimers.has(taskId)) {
        const timer = taskTimers.get(taskId);
        const elapsed = timer.initialDuration + Math.floor((Date.now() - timer.startTime) / 1000);
        taskTimers.set(taskId, { pausedDuration: elapsed });
        stopGlobalTimer();
    }
}

function resumeTaskTimer(taskId) {
    if (taskTimers.has(taskId)) {
        const pausedDuration = taskTimers.get(taskId).pausedDuration || 0;
        taskTimers.set(taskId, {
            startTime: Date.now(),
            initialDuration: pausedDuration
        });
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