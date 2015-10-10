module.exports = function(grunt) {

	require("matchdep").filterDev("grunt-*").forEach(grunt.loadNpmTasks);

	// Set Relative Path
	var optionsContext = grunt.option('context') || '';

	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),

		// SCSS to CSS convert
		sass: {
			dist: {
				files: {
					'public/stylesheets/main.css': 'sass/main.scss'
				}
			}
		},
		// LiveReload in browser
		watch: {
			scripts: {
				files: ['views/**/*.ejs','sass/**/*.scss'], // File types to watch for
				tasks: ['sass'], // Tasks that should run on save
				options: {
					livereload: true,
					spawn: false
				},
			},
			sass: {
				// We watch and compile sass files as normal but don't live reload here
				files: ['sass/**/*.scss'],
				tasks: ['sass']
			}
		}
	});
	// Register Tasks - on save and on first build
	grunt.registerTask('build', ['sass']);
	grunt.registerTask('default', ['build', 'watch']);
};