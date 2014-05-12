angular.module('uqmarkupApp').factory('userLookupService', function($http) {

    'use strict';
    
    var service = {};

    service.findUsers = function(keyword, type, callback) {
    	var matches = [];
    	$http({method: 'GET', url: '/_dev/jsonapi/userlookup/'+type+'/'+keyword}).success(function(data, status, headers, config) {
    		for(var username in data) {
    			var newObj = {
	    			username: username,
	    			name: data[username]	
    			};
    			matches.push(newObj);
    		}
   		});
    	callback(matches);
    };
    return service;
});