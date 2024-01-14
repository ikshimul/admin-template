@props([
    'style_class' => 'table table-bordered table-striped',
])

<div class="table-rep-plugin">
    <div class="table-responsive mb-0" data-pattern="priority-columns">
        <table {{ $attributes->merge(['class' => $style_class ]) }}>
            <thead>
                <tr>
                    {{ $head }}
                </tr>
            </thead>
            <tbody>
                {{ $body }}
            </tbody>
        </table>
    </div>
</div>