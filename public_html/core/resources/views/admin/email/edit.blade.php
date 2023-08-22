<div>
    <div class="row">
        <div class="col-md-6 order-sm-2 order-md-1">
            <div class="card">
                <div class="card-body p-0">
                    <div class="table-responsive table-responsive-sm">
                        <table class="table align-items-center table-light">
                            <thead>
                                <tr>
                                    <th>@lang('Short Code')</th>
                                    <th>@lang('Description')</th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                @forelse($template['shortcodes'] as $shortcode => $key)
                                    <tr>
                                        <th data-label="@lang('Short Code')">@php echo "{{ ". $shortcode ." }}"  @endphp</th>
                                        <td data-label="@lang('Description')">{{ __($key) }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="100%" class="text-muted text-center">{{ __('No Shortcodes!') }}
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
             <!--card end -->
        </div>

        <div class="col-md-6 order-md-1 order-sm-2">
            <div class="card">
                <div class="card-header bg-dark">
                    <h5  style="color: #000 !important">{{ __($template['name']) }}</h5>
                </div>
                <form action="{{route('moder.update-template', $template['id'])}}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <label class="font-weight-bold">@lang('Subject') <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-lg" required
                                    placeholder="@lang('Email subject')" name="subject" value="{{$template['subj']}}"/>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="font-weight-bold">@lang('Status') <span
                                        class="text-danger">*</span></label>
                                <!--<x-bs::check model="template.email_status" name="email_status" switch  :label="__('Enable Sending ')" />-->
                                <label for="mail">    
                                    <input id="mail" type="checkbox" {{$template['email_status'] == 1 ? 'checked' : ''}} name="email_status" value="active" />
                                    Enable Sending
                                </label>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="font-weight-bold">@lang('Message') <span
                                        class="text-danger">*</span></label>
                                <textarea name="email_body"  rows="10" class="form-control" id="content"
                                    placeholder="@lang('Your message using shortcodes')">{{ $template['email_body'] }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-block btn-primary mr-2" style="background: #6FB99F;border-color: #6FB99F;box-shadow:none;" >@lang('Submit')</button>
                        <button class="btn btn-warning btn-block" type="submit" wire:click="cancelEdit()" style="background: #4D6D7D;border-color: #4D6D7D;box-shadow:none;">Cancel </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @push('style')
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet" />
        <style>
            body{
                font-family: "Montserrat","sans-serif" !important;
            }
            .topbar .dropdown-menu .dropdown-item{
                color: #fff !important;
            }
            
            .topbar .top-navbar .navbar-nav>.nav-item>.nav-link{
                text-decoration: none !important;
            }
            .topbar .dropdown-menu .dropdown-item:hover{
                background: transparent !important;
            }
            
        </style>
    @endpush
    @push('script')
        <script>
              var themes = {
                    "default": "//netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css",
                    "cerulean" : "//bootswatch.com/3/cerulean/bootstrap.css",
                    "cosmo" : "//bootswatch.com/3/cosmo/bootstrap.css",
                    "cyborg" : "//bootswatch.com/3/cyborg/bootstrap.css",
                    "darkly" : "//bootswatch.com/3/darkly/bootstrap.css",
                    "flatly" : "//bootswatch.com/3/flatly/bootstrap.css",
                    "lumen" : "//bootswatch.com/3/lumen/bootstrap.css",
                    "paper" : "//bootswatch.com/3/paper/bootstrap.css",
                    "journal" : "//bootswatch.com/3/journal/bootstrap.css",
                    "readable" : "//bootswatch.com/3/readable/bootstrap.css",
                    "sandstone" : "//bootswatch.com/3/sandstone/bootstrap.css",
                    "simplex" : "//bootswatch.com/3/simplex/bootstrap.css",
                    "slate" : "//bootswatch.com/3/slate/bootstrap.css",
                    "spacelab" : "//bootswatch.com/3/spacelab/bootstrap.css",
                    "superhero" : "//bootswatch.com/3/superhero/bootstrap.css",
                    "united" : "//bootswatch.com/3/united/bootstrap.css",
                    "yeti" : "//bootswatch.com/3/yeti/bootstrap.css",
                  }
        </script>
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
        <script>
            $(function() {
                
                // var $themesheet = $('<link href="'+themes['default']+'" rel="stylesheet" />')
                // $themesheet.appendTo('head');
               
                $('#content').summernote({});
                
            });
        </script>
    @endpush
</div>
