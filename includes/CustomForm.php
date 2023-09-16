<?php 


class CustomForm{
    
    /**
     * form
     *
     * @var mixed
     */
    public $form;
    

    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        // configure form error and success class
        config_form([
            'class' => [
                'error' => 'border border-t-4 border-red-400 text-red-700',
                'success' => 'border border-t-4 border-teal-400 text-teal-700',
            ]
        ]);

        $this->form = form();
    }

    
    /**
     * validateForm
     *
     * @return void
     */
    public function validateForm()
    {
        $this->form->submit([
            'string:name' => 'Name is required',
            'int:age' => 'Age is required',
            'int:age:<:18' => 'Must be 18 years and above',
            'array:activities' => 'Select at least one Activity',
        ])->error(function($response){
            // execute any code on error
        })->success(function($response){
    
            // this holds all form data
            $param = $response->param;
    
    
            $response->message = "Form submited! But without file upload";
        });
    }
    
    /**
     * validateCheckbox
     *
     * @param  mixed $parent
     * @param  mixed $key
     * @return mixed
     */
    public function validateCheckbox($parent = 'activities', $key = null)
    {
        if(isset($this->form->old($parent)[$key])){
            return 'checked';
        }
    }


}