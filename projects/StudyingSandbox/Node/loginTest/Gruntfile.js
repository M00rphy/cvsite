/*global module:false*/
module.exports = function (grunt) {
    'use strict';

    // Project configuration.
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        obfuscator: {
            options: {
                debugProtection: false,
                debugProtectionInterval: false,
                //domainLock: ['www.example.com'],
                compact: true,
                selfDefending: true
            },
            task1: {
                options: {
                    // options for each sub task
                },
                files: {
                    'main/dist/TSEngineO.js': [
                        'engine/TSEngine.js'
                    ],
                    'main/dist/TS.js': [
                        'GameScripts/TheSourceSB.js'
                    ],
                    'main/dist/handlers.js': [
                        'Handlers/dataHandlers.js'
                    ],
                    'main/dist/timer.js': [
                        'jsLibraries/timeCheck.js'
                    ],
                    'main/dist/keys.js': [
                        'jsLibraries/keyhandler.js'
                    ]
                }
            }
        },

        compress: {
            main: {
                options: {
                    mode: 'zip',
                    archive: 'app.nw'
                },
                files: [
                    {
                        src: ['main/NodeTests/customers/**'],
                        dest: '/nodewebkit/'
                    }, // includes files in path and its subdirs
                ]
            }
        },

        nwjs: {
            main: {
                options: {
                    platforms: ['win'],
                    buildDir: 'webkitbuilds', // Where the build version of my NW.js app is saved
                    forceDownload: true,
                    run: true
                },
                src: ['main/NodeTests/customers/**/*'] // Your NW.js app
            }
        }

    });

    // Default task.
    grunt.registerTask('default', ['obfuscator:task1', 'nwjs:main']);
    grunt.loadNpmTasks('grunt-contrib-obfuscator');
    //grunt.loadNpmTasks('grunt-contrib-compress');
    grunt.loadNpmTasks('grunt-nw-builder');

};
