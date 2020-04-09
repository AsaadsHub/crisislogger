<div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload File</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="ConsentForm">
                <div class="modal-body">


                    <div class="form-group">
                        <p>Share publicly?</p>
                        <div class="kt-radio-inline">
                                <label class="kt-radio">
                                    <input type="radio" name="share" value="1" checked="checked"> Yes -- recording + transcript
                                    <span></span>
                                </label>
                                <label class="kt-radio">
                                    <input type="radio" name="share" value="2"> transcript only
                                    <span></span>
                                </label>
                                <label class="kt-radio">
                                    <input type="radio" name="share" value="0"> No
                                    <span></span>
                                </label>
                        </div>
                        <span class="form-text text-muted">If Yes, others will have an opportunity to hear or read what you have to say.</span>
                    </div>

                    <div class="form-group">
                        <p>Contribute to science?</p>
                        <div class="kt-radio-inline">
                                <label class="kt-radio">
                                    <input type="radio" name="contribute" value="1" checked="checked"> Yes
                                    <span></span>
                                </label>
                                <label class="kt-radio">
                                    <input type="radio" name="contribute" value="0"> No
                                    <span></span>
                                </label>
                        </div>
                        <span class="form-text text-muted">If Yes, THANK YOU for your contribution! We will analyze the audio and transcript, and will report back the anonymized results publicly.</span>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" id="upload">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>
