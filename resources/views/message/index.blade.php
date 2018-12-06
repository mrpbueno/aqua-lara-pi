    @extends('adminlte::page')

    @section('title', 'AquaLaraPi - Telegram')

    @section('content_header')
        <h1>{{ trans('app.telegram') }}</h1>
        <ol class="breadcrumb">
            <li><i class="fa fa-dashboard"></i> {{ trans('app.home') }}</li>
            <li>{{ trans('app.system') }}</li>
            <li class="active">{{ trans('app.telegram') }}</li>
        </ol>
    @stop

    @section('content')
        <section class="content">
        <div class="row">
            <div class="col-md-6">
                <!-- DIRECT CHAT -->
                <div class="box box-primary direct-chat direct-chat-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{ trans('app.messages') }}</h3>

                        <div class="box-tools pull-right">
                            <span data-toggle="tooltip" title="" class="badge bg-yellow" data-original-title="3 New Messages"></span>
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="" data-widget="chat-pane-toggle" data-original-title="Contacts">
                                <i class="fa fa-comments"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <!-- Conversations are loaded here -->
                        <div class="direct-chat-messages">
                            @foreach($messages as $message)
                                @if($message->action == 'receive')
                            <!-- Message. Default to the left -->
                            <div class="direct-chat-msg">
                                <div class="direct-chat-info clearfix">
                                    <span class="direct-chat-name pull-left">{{ $message->firist_name }} - {{ $message->from_id }}</span>
                                    <span class="direct-chat-timestamp pull-right">{{ date('d/m/Y H:i', $message->date) }}</span>
                                </div>
                                <!-- /.direct-chat-info -->
                                <img class="direct-chat-img" src="{{ asset('img/user.png') }}" alt="message user image">
                                <!-- /.direct-chat-img -->
                                <div class="direct-chat-text">
                                    {!! nl2br(e($message->text)) !!}
                                </div>
                                <!-- /.direct-chat-text -->
                            </div>
                            <!-- /.direct-chat-msg -->
                                @endif
                                @if($message->action == 'send')
                            <!-- Message to the right -->
                            <div class="direct-chat-msg right">
                                <div class="direct-chat-info clearfix">
                                    <span class="direct-chat-name pull-right">{{ $message->firist_name }} - {{ $message->from_id }}</span>
                                    <span class="direct-chat-timestamp pull-left">{{ date('d/m/Y H:i', $message->date) }}</span>
                                </div>
                                <!-- /.direct-chat-info -->
                                <img class="direct-chat-img" src="{{ asset('img/user.png') }}" alt="message user image">
                                <!-- /.direct-chat-img -->
                                <div class="direct-chat-text">
                                    {!! nl2br(e($message->text)) !!}
                                </div>
                                <!-- /.direct-chat-text -->
                            </div>
                                @endif
                            @endforeach
                            <!-- /.direct-chat-msg -->
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <form action="{{ route('message.send') }}" method="post">
                            <div class="input-group">
                                <input type="text" name="message" placeholder="{{ trans('app.message') }} ..." class="form-control">
                                {{ csrf_field() }}
                                <span class="input-group-btn">
                                <button type="submit" class="btn btn-primary btn-flat">{{ trans('app.send') }}</button>
                              </span>
                            </div>
                        </form>
                    </div>
                    <!-- /.box-footer-->
                </div>
                <!--/.direct-chat -->
            </div>
        </div>
        </section>
    @stop
    @section('js')

    @stop