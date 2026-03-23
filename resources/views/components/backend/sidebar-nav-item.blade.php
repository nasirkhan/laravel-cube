@props(["url" => "/", "icon" => "fa-solid fa-cube", "text" => "Menu", "permission" => "view_backend"])

@can($permission)
    <li class="nav-item">
        <a class="nav-link" href="{{ $url }}">
            <i class="nav-icon {{ $icon }}" aria-hidden="true"></i>
            &nbsp;{{ $text }}
        </a>
    </li>
@endcan
