<!-- Modal -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="login"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="login">Add Review</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('addReview') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <span class="mx-2">Rate </span>
                        <span class="text-warning fa fa-star rate" id="star1" onmouseover="rate_update(this,1)"></span>
                        <span class="fa fa-star rate" id="star2" onmouseover="rate_update(this,2)"></span>
                        <span class="fa fa-star rate" id="star3" onmouseover="rate_update(this,3)"></span>
                        <span class="fa fa-star rate" id="star4" onmouseover="rate_update(this,4)"></span>
                        <span class="fa fa-star rate" id="star5" onmouseover="rate_update(this,5)"></span>
                        <span class="mx-2 rate_value_show">( 1/5 )</span>
                        <input type="hidden" class="rate_value" value="1" name="rate_value">
                        <input type="hidden" value="{{ $product->id }}" name="product_id">
                    </div>

                    <div class="form-group">
                        <label for="review">Write a comment</label>
                        <textarea class="form-control" id="review" name="review" rows="3"></textarea>
                    </div>
                    <div class="d-flex">
                        <button type="submit" class="site-btn ml-auto">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
