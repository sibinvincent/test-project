@php($time = time())
<div class="modal modal-blur fade" id="modal-success-{{$time}}" tabindex="-1" role="dialog" aria-hidden="false">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="btn-close" onclick="closeCustom()" aria-label="Close"></button>
            <div class="modal-status bg-success"></div>
            <div class="modal-body text-center py-4">
                <!-- Download SVG icon from http://tabler-icons.io/i/circle-check -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-green icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" /><path d="M9 12l2 2l4 -4" /></svg>
                <h3>{{$title}}</h3>
                <div class="text-muted">{{$slot}}</div>
            </div>
            <div class="modal-footer">
                <div class="w-100">
                    <div class="row">
                        <div class="col"><a href="#" class="btn btn-success w-100" onclick="closeCustom{{$time}}()">
                                {{$actionText}}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function openCustom{{$time}}() {
        document.getElementsByTagName("body")[0].classList.add("modal-open");
        let modal = document.getElementById('modal-success-{{$time}}');
        modal.classList.add('show');
        modal.style.display ='block'
    }
    function closeCustom{{$time}}() {
        document.getElementsByTagName("body")[0].classList.remove("modal-open");
        let modal = document.getElementById('modal-success-{{$time}}');
        modal.classList.remove('show');
        modal.style.display ='none'
    }

    @if($open)
        openCustom{{$time}}()
    @endif
</script>
