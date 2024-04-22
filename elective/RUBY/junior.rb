require_relative 'mid'
class Jun < Mid
    def initialize
        super
        @energy = 150
        count_Juniors
        self
    end
    def how_many
        puts "There are #{@@count} Juniors"
    end
    def acceptAssign
        @time += 2
        assign
    end
end

jun1 = Jun.new
jun2 = Jun.new
jun3 = Jun.new
jun = Jun.new.acceptAssign.showStats.how_many