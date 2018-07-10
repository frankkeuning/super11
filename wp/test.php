<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, user-scalable=yes" />



  <style>
    body { margin: 0; padding: 0; overflow: hidden; }
    #editor {
      position: absolute;
      width: 100%;
      height: 100%;
    }

    #fs {
      width: 50px;
      height: 50px;
      position: fixed;
      bottom: 0px;
      left: calc(50% - 25px);
      background: grey;
      z-index: 100;
    }
  </style>

</head>
<body>

  <div id="editor"></div>
  <div id="fs" onclick="full_screen();"></div>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.13.1/min/vs/loader.js"></script>
  <script>

var script = 
`/**
 * \`f_next\` method module.
 * @module methods/next
 * @TODO, split functionality,
 * @return {object} this
 * @example
 * // Results in the calling of the next method in the \`f_function_flow\`
 * this.f_next('arg0', 'arg1');
 */
module.exports = function f_next() {
  /**
   * Needed cuz \`this.f_flow_i\` should be bumped before the
   * corresponding f_function_flow method is called.
   * @type {number}
   */
  var old_function_flow_i = this.f_flow_i;

  /**
   * Instance f_function_flow array flow element.
   * @type {object}
   */
  var next_flow = this.f_function_flow[old_function_flow_i];

  // If there is an element in the function_flow array, try calling it
  // else abort.
  if (next_flow) {
    if (next_flow.tries >= next_flow.max_tries) {
      this.f_abort(next_flow.name + '.tries >= ' + next_flow.name +
        '.max_tries');
    }
    else if (this[next_flow.name]
             && typeof this[next_flow.name] === 'function') {
      this.f_flow_i++;
      next_flow.tries++;
      this[next_flow.name].apply(
        this,
        arguments.length ? arguments : undefined
      );

      /**
       * next event.
       * @event next
       */
      this.emit('next');
    }
    else {
      this.f_abort('Could not call a function_flow method');
    }
  }
  else {
    // f_next gets called from the last method of the function_flow
    if (this.f_flow_i === this.f_function_flow.length) {
      this.f_finish();
    }
    else {
      this.f_abort('No function to call, is there something wrong with'
        + ' f_function_flow');
    }
  }

  return this;
};
`;

    require.config({ paths: { 'vs': 'https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.13.1/min/vs' }});
    window.MonacoEnvironment = {
      getWorkerUrl: function(workerId, label) {
        return 'monaco-editor-worker-loader-proxy.js';
      }
    };
    require(["vs/editor/editor.main"], function () {
      var editor = monaco.editor.create(document.getElementById('editor'), {
        value: script,
        language: 'javascript',
        scrollBeyondLastLine: true,
        theme: "vs-dark",
        automaticLayout: true,
        contextmenu: false,
        lineNumbers: false
      });
    });


function full_screen()
      {
          // check if user allows full screen of elements. This can be enabled or disabled in browser config. By default its enabled.
          //its also used to check if browser supports full screen api.
          if("fullscreenEnabled" in document || "webkitFullscreenEnabled" in document || "mozFullScreenEnabled" in document || "msFullscreenEnabled" in document) 
          {
            if(document.fullscreenEnabled || document.webkitFullscreenEnabled || document.mozFullScreenEnabled || document.msFullscreenEnabled)
            {
              console.log("User allows fullscreen");
              
                var element = document.getElementById("editor");
                //requestFullscreen is used to display an element in full screen mode.
                if("requestFullscreen" in element) 
                {
                    element.requestFullscreen();
                } 
                else if ("webkitRequestFullscreen" in element) 
                {
                    element.webkitRequestFullscreen();
                } 
                else if ("mozRequestFullScreen" in element) 
                {
                    element.mozRequestFullScreen();
                } 
                else if ("msRequestFullscreen" in element) 
                {
                    element.msRequestFullscreen();
                }

            }
          }
          else
          {
              console.log("User doesn't allow full screen");
          }
      }
      function screen_change()
      {
        //fullscreenElement is assigned to html element if any element is in full screen mode.
        if(document.fullscreenElement || document.webkitFullscreenElement || document.mozFullScreenElement || document.msFullscreenElement) 
        {
            console.log("Current full screen element is : " + (document.fullscreenElement || document.webkitFullscreenElement || document.mozFullScreenElement || document.msFullscreenElement))
        }
        else
        {
          // exitFullscreen us used to exit full screen manually
          if ("exitFullscreen" in document) 
          {
              document.exitFullscreen();
          } 
          else if ("webkitExitFullscreen" in document) 
          {
              document.webkitExitFullscreen();
          } 
          else if ("mozCancelFullScreen" in document) 
          {
              document.mozCancelFullScreen();
          } 
          else if ("msExitFullscreen" in document) 
          {
              document.msExitFullscreen();
          }
        }
      }

      //called when an event goes full screen and vice-versa.
      document.addEventListener("fullscreenchange", screen_change);
      document.addEventListener("webkitfullscreenchange", screen_change);
      document.addEventListener("mozfullscreenchange", screen_change);
      document.addEventListener("MSFullscreenChange", screen_change);

      //called when requestFullscreen(); fails. it may fail if iframe don't have allowfullscreen attribute enabled or for something else. 
      document.addEventListener("fullscreenerror", function(){console.log("Full screen failed");});
      document.addEventListener("webkitfullscreenerror", function(){console.log("Full screen failed");});
      document.addEventListener("mozfullscreenerror", function(){console.log("Full screen failed");});
      document.addEventListener("MSFullscreenError", function(){console.log("Full screen failed");});
  </script>

</body>
</html>