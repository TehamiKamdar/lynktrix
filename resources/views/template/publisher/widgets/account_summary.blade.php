<div class="card border-0">
    <div class="card-header">
        <h6>Account Summary</h6>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table--default">
                <tbody>
                    @foreach($accountSummary as $summary)
                        <tr>
                            <td>
                                <div class="title">
                                    {{ ucwords($summary['status']) }} Advertisers
                                </div>
                            </td>
                            <td>
                                <strong>{{ $summary['total'] }}</strong>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>
