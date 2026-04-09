// Initialize Select2 for all select elements with class 'form-control'
// This file handles Select2 initialization and data loading

$(document).ready(function() {
    // Initialize Select2 for all select dropdowns
    initializeSelect2();
    
    // Load data from data.json
    loadFormData();
});

// Initialize Select2 for all select elements
function initializeSelect2() {
    // Initialize all select elements as Select2
    $('select.form-control').each(function() {
        $(this).select2({
            width: '100%',
            class: 'custom-select2',
            allowClear: !$(this).prop('required'),
            placeholder: $(this).attr('placeholder') || 'Select an option'
        });
    });
}

// Load data from data.json file
function loadFormData() {
    $.ajax({
        url: '/data.json',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            // Populate status dropdowns
            populateStatusDropdowns(data.statuses);
            // Populate state dropdowns
            populateStateDropdowns(data.states);
        },
        error: function(error) {
            console.log('Error loading data.json:', error);
        }
    });
}

// Populate status dropdowns with data from data.json
function populateStatusDropdowns(statuses) {
    $('select[name="status"]').each(function() {
        const $select = $(this);
        const currentValue = $select.val();
        
        // Keep the first option (Select Status)
        const $firstOption = $select.find('option:first');
        $select.empty().append($firstOption);
        
        // Add status options from data.json
        $.each(statuses, function(index, status) {
            $select.append($('<option></option>')
                .attr('value', status.value)
                .text(status.label)
                .prop('selected', status.value === currentValue)
            );
        });
        
        // Reinitialize Select2 for this dropdown
        $select.select2({
            width: '100%',
            allowClear: !$select.prop('required'),
            placeholder: 'Select Status'
        });
    });
}

// Populate state dropdowns with data from data.json
function populateStateDropdowns(states) {
    // Find all state input/select elements
    $('input[name="address_state"], select[name="address_state"]').each(function() {
        const currentElement = $(this);
        const currentValue = currentElement.val();
        
        // If it's an input, convert it to a select
        if (currentElement.is('input')) {
            const $newSelect = $('<select>')
                .attr('name', 'address_state')
                .attr('id', currentElement.attr('id') || 'address_state')
                .addClass('form-control')
                .prop('required', currentElement.prop('required'));
            
            // Add placeholder option
            $newSelect.append($('<option></option>')
                .attr('value', '')
                .attr('disabled', 'disabled')
                .text('Select State'));
            
            // Add state options
            $.each(states, function(index, state) {
                $newSelect.append($('<option></option>')
                    .attr('value', state)
                    .text(state)
                    .prop('selected', state === currentValue)
                );
            });
            
            // Replace the input with the select
            currentElement.replaceWith($newSelect);
            
            // Initialize Select2
            $newSelect.select2({
                width: '100%',
                allowClear: !$newSelect.prop('required'),
                placeholder: 'Select State'
            });
        } else if (currentElement.is('select')) {
            // If it's already a select, just populate it
            const $firstOption = $('<option></option>')
                .attr('value', '')
                .attr('disabled', 'disabled')
                .text('Select State');
            
            currentElement.empty().append($firstOption);
            
            $.each(states, function(index, state) {
                currentElement.append($('<option></option>')
                    .attr('value', state)
                    .text(state)
                    .prop('selected', state === currentValue)
                );
            });
            
            // Initialize Select2
            currentElement.select2({
                width: '100%',
                allowClear: !currentElement.prop('required'),
                placeholder: 'Select State'
            });
        }
    });
}
