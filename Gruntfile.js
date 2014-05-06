module.exports = function(grunt) {

	grunt.initConfig({
		banner: '/*\n' +
			'Theme Name: <%= pkg.name %>\n' +
			'Theme URI: velo-online.ch\n' +
			'Version: <%= pkg.version %>\n' +
			'Requires at least: WP 3.0\n' +
			'Author: <%= pkg.author %>\n' +
			'Build Date: <%= grunt.template.today("yyyy-mm-dd") %>\n' +
			'Github URI: https://github.com/kosmobot\n' +
			'\n<%= pkg.description %> \n' +
			'*/',

		pkg: grunt.file.readJSON('package.json'),
		less: {
			dist: {
				files: {
					"tmp/style.css": "src/styles/index.less"
      			}
			}
		},
		usebanner: {
			dist: {
				options: {
					position: 'top',
					banner: '<%= banner %>'
				},
				files: {
					src: [
						'src/style.css'
					]
				}
			}
		},
		copy: {
			main: {
				expand: true,
				cwd:'src/',
				src: ['*.php'],
				dest: 'tmp/'
			},
			test: {
				expand: true,
				cwd: 'tmp/',
				src: '*.*',
				dest: '/Users/jeppe/Projects/veloonline/www/wp-content/themes/velo-online/' 
			}
		},
		zip: {
			'bin/velo-online-theme.zip': [
				'tmp/*.php',
				'tmp/*.css'
			]
		},
		watch: {
			scripts: {
				files: ['src/**/*.less', 'src/*.php'],
				tasks: ['less', 'usebanner', 'copy']
			}
		}
	});

	grunt.loadNpmTasks('grunt-contrib-copy');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-zip');
	grunt.loadNpmTasks('grunt-contrib-less');
	grunt.loadNpmTasks('grunt-banner');

	grunt.registerTask('default', ['less', 'usebanner', 'copy:main', 'zip']);
}