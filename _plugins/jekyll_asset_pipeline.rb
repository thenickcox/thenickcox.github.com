require 'jekyll_asset_pipeline'

module JekyllAssetPipeline
  class SassConverter < JekyllAssetPipeline::Converter
    require 'sass'

    def self.filetype
      '.sass'
    end

    def convert
      return Sass::Engine.new(@content, syntax: :sass).render
    end
  end

  class CoffeeScriptConverter < JekyllAssetPipeline::Converter
    require 'coffee-script'

    def self.filetype
      '.coffee'
    end

    def convert
      return CoffeeScript.compile(@content)
    end
  end
end
